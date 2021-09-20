<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coursereview;

class Coursereviews extends Component
{
    public $url, $type, $name, $title, $description, $data_id, $metaId;
    public $isOpen = 0;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   Coursereview::leftJoin('courses as b', function($join) { $join->on("b.id", "=", "coursereviews.courseid"); })
                    ->leftJoin('users as c', function($join) { $join->on("c.id", "=", "coursereviews.userid"); })
                    ->select('coursereviews.id', 'coursereviews.courseid', 'coursereviews.userid', 'coursereviews.review', 'coursereviews.rating', 'coursereviews.status', 'coursereviews.updated_at', 'b.name as courseName', 'b.url', 'c.name', 'c.email')
                    ->search($this->search)
                    ->orderBy($this->sortBy, $this->sortDirection)
                    ->paginate($this->perPage);

        return view('livewire.admin.coursereviews');
    }
}
