<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CalendarioController extends Controller
{
    // Horas disponibles en formato 24h
    protected $availableHours = [
        "09:00:00", "10:00:00", "11:00:00", "12:00:00", 
        "14:00:00", "15:00:00", "16:00:00", "17:00:00"
    ];

    /**
     * Muestra la disponibilidad para el calendario y para el selector de horas
     */
    public function checkAvailability(Request $request)
    {
        try {
            $totalSlotsPerDay = count($this->availableHours);

            // CASO 1: Si el JS pide una fecha específica (para llenar el select de horas)
            if ($request->has('date')) {
                $selectedDate = $request->query('date');
                
                $occupiedHours = DB::table('citasses')
                    ->where('fecha', $selectedDate)
                    ->pluck('hora')
                    ->map(function($hora) {
                        return substr($hora, 0, 5); // Convierte "09:00:00" a "09:00"
                    });

                return response()->json([
                    'success' => true,
                    'data' => [
                        'occupied' => $occupiedHours,
                        'all_slots' => array_map(fn($h) => substr($h, 0, 5), $this->availableHours)
                    ]
                ]);
            }

            // CASO 2: Si el JS pide los eventos (para pintar el calendario completo)
            $citasCount = DB::table('citasses')
                ->select('fecha', DB::raw('COUNT(*) as count'))
                ->groupBy('fecha')
                ->get();

            $events = $citasCount->map(function($row) use ($totalSlotsPerDay) {
                return [
                    'start' => $row->fecha, // FullCalendar usa 'start' para la fecha
                    'title' => $row->count >= $totalSlotsPerDay ? 'Día Lleno' : $row->count . ' citas',
                    'color' => $row->count >= $totalSlotsPerDay ? '#d9534f' : '#f0ad4e',
                    'allDay' => true
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $events
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error en el servidor: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Guarda una nueva cita en la base de datos
     */
    /**
     * Guarda una nueva cita en la base de datos
     */
    public function store(Request $request)
    {
        try {
            // --- PASO CLAVE PARA KUKY PETS ---
            // Si el servicio llega como un array (checkboxes), lo convertimos a texto
            // antes de validar para que Laravel no se confunda.
            if ($request->has('servicio') && is_array($request->servicio)) {
                $request->merge([
                    'servicio' => implode(', ', $request->servicio)
                ]);
            }

            // 1. Validar datos
            $validated = $request->validate([
                'fecha'    => 'required|date',
                'hora'     => 'required',
                'nombre'   => 'required|string|max:255',
                'servicio' => 'required|string', // Ahora sí es un string gracias al merge
                'email'    => 'nullable|email',
                'telefono' => 'nullable|string',
                'notas'    => 'nullable|string',
            ]);

            // 2. Insertar en la tabla citasses
            DB::table('citasses')->insert([
                'fecha'      => $validated['fecha'],
                'hora'       => $validated['hora'],
                'nombre'     => $validated['nombre'],
                'email'      => $validated['email'],
                'telefono'   => $validated['telefono'],
                'servicio'   => $validated['servicio'], // Se guarda como "Baño, Corte, etc"
                'notas'      => $validated['notas'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'success' => true, 
                'message' => '¡Cita guardada en Kuky Pets!'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Esto captura específicamente errores de validación (el cuadro rosa)
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
                'message' => 'Error de validación: El campo servicio debe ser texto.'
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Error al guardar: ' . $e->getMessage()
            ], 500);
        }
    }
}