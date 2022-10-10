<?php

namespace App\Http\Resources;

use App\Models\Module;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $module = Module::findOrFail($this->module_id)->name;
        
        return [
            'id' => $this->id,
            'lessonName' => $module, 
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'video' => $this->video,
        ];
    }
}
