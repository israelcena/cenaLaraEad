<?php

namespace App\Http\Resources;

use App\Models\Course;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $course = Course::findOrFail($this->course_id)->name;
        return [
            'id' => $this->id,
            'courseName'=> $course,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
