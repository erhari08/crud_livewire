<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $name,$email,$address,$city,$state,$zip,$image;
    public $posts;

    public $files = [];
    public $uploadProgress = [];
    public $ticketNo;

    public function mount()
    {
        // Generate a unique ticket number (e.g., timestamp-based)
        $this->ticketNo = now()->format('YmdHis');
    }

    public function updatedFiles()
    {
        foreach ($this->files as $index => $file) {
            $this->uploadFile($file, $index);
        }
    }

    public function uploadFile($file, $index)
    {
        $this->uploadProgress[$index] = 0; // Initialize progress

        // Simulate progress (use queue or real-time events in production)
        for ($i = 0; $i <= 100; $i += 10) {
            $this->uploadProgress[$index] = $i;
            usleep(50000); // Simulating delay
            $this->dispatchBrowserEvent('progressUpdated');
        }

        // Save file with ticket-based naming
        $filename = "{$this->ticketNo}_{$index}." . $file->getClientOriginalExtension();
        $path = $file->storeAs('uploads', $filename, 'public');

        $this->uploadProgress[$index] = 100; // Complete
    }


    public function store()
    {

        $this->validate([
                'name'=>'required',
                'email'=>'required|email',
                'address'=>'required',
                'city'=>'required',
                'state'=>'required',
                'zip'=>'required',
                'image'=>"image|max:2048"
            ]);
        $path = $this->image->store('images', 'public'); // Save to storage/app/public/images
        Post::create([
              'name'=>$this->name,
              'email'=>$this->email,
              'address'=>$this->address,
              'city'=>$this->city,
              'state'=>$this->state,
              'zip'=>$this->zip,
              'image'=>$path,
        ]);
        session()->flash('message','post created successfully')  ;
        $this->inputFields();
    
    }

    public function inputFields(){
        $this->name=" ";
        $this->email=" ";
        $this->address=" ";
        $this->city=" ";
        $this->state=" ";
        $this->zip=" ";
        $this->image=" ";
    }

    public function edit($id)
    {
        $this->posts= Post::all();
        // return view('livewire.create-post');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
    }

    public function render()
    {
        $this->posts= Post::all();
        return view('livewire.create-post');
    }


}
