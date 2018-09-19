<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Event;

class Events_admin extends Controller
{
    public function check_user()
    {
        if (Auth::check()) {
            if (Auth::user()->group == 1 || Auth::user()->group == 2) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function events(Request $request)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            $data['events'] = Event::all();
            return view('hrms.events.eventsList', $data);
        }
    }

    public function events_add(Request $request)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            if ($request->isMethod('GET')) {
                return view('hrms.events.eventsAdd');

            } elseif ($request->isMethod('POST')) {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'start_datetime' => 'required',
                    'publish' => 'required|int',
                ]);

                $events = new Event();
                $events->name = $request->input('name');
                $events->start_datetime = $request->input('start_datetime');
                $events->end_datetime = $request->input('end_datetime');
                $events->details = $request->input('details');
                $events->publish = $request->input('publish');

                if ($events->save()) {
                    $request->session()->flash('smsg', 'Event added successfully!');
                    return redirect()->route('events');
                } else {
                    $request->session()->flash('emsg', 'Event add failed!!!');
                    $data['departments'] = Department::all();
                    return view('hrms.events.eventsAdd', $data);
                }
            }
        }
    }

    public function events_edit(Request $request, $id)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            if ($request->isMethod('GET')) {
                $data['events'] = Event::find($id);
                if ($data['events']) {
                    return view('hrms.events.eventsEdit', $data);
                } else {
                    $request->session()->flash('emsg', 'Event not found!!!');
                    return redirect()->route('events');
                }

            } elseif ($request->isMethod('POST')) {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'start_datetime' => 'required',
                    'publish' => 'required|int',
                ]);

                $events = Event::find($id);
                $events->name = $request->input('name');
                $events->start_datetime = $request->input('start_datetime');
                $events->end_datetime = $request->input('end_datetime');
                $events->details = $request->input('details');
                $events->publish = $request->input('publish');

                if ($events->update()) {
                    $request->session()->flash('smsg', 'Event updated successfully!');
                    return redirect()->route('events');
                } else {
                    $request->session()->flash('emsg', 'Event update failed!!!');
                    $data['events'] = Event::find($id);

                    if ($data['events']) {
                        return view('hrms.events.eventsEdit', $data);
                    } else {
                        $request->session()->flash('emsg', 'Event not found!!!');
                        return redirect()->route('events');
                    }
                }
            }
        }
    }

    public function events_delete(Request $request, $id)
    {
        if (Auth::check()) {
            if ($id) {
                $events = Event::find($id);
                if ($events->delete()) {
                    $request->session()->flash('smsg', 'Event deleted!!!');
                    return redirect()->route('events');
                } else {
                    $request->session()->flash('emsg', 'Failed to delete Event!!!');
                    return redirect()->route('events');
                }
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function events_view(Request $request, $id)
    {
        if (Auth::check()) {
            if ($id) {
                $data['events'] = Event::find($id);
                if ($data['events']) {
                    return view('hrms.events.eventsView', $data);
                } else {
                    $request->session()->flash('emsg', 'Event not found!!!');
                    return redirect()->route('events');
                }
            }
        } else {
            return redirect()->route('login');
        }
    }


}
