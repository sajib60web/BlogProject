<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:contact-message-list', ['only' => ['index']]);
        $this->middleware('permission:contact-message-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_name'] = 'Contact Message List';
        $data['contact_messages'] = ContactMessage::all();
        return view('admin.contact_messages.index', $data);
    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ContactMessage::find($id)->delete();
        $notification = array(
            'message' => 'Contact Message Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('contact_messages.index')->with($notification);
    }
}
