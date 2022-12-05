<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'status' => $this->qa,
            'status_label' => $this->qaStatus[$this->qa],
            'description' => $this->description,
            'update_at' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),
            'user' => new UserResource($this->user),
            'lesson' => new LessonResource($this->lesson),
            // 'replies' => ReplySupportResource::collection($this->replies),
        ];
    }
}
