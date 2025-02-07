<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'class' => new SchoolClassResource($this->class),
            'subject' => new SubjectResource($this->subject),
            'teacher' => [
                'id' => $this->teacher->id,
                'name' => $this->teacher->name,
                'surname' => $this->teacher->surname,
                'email' => $this->teacher->email,
            ],
            'day_of_week' => $this->day_of_week,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ];
    }
}
