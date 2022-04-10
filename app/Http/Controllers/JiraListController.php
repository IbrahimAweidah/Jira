<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Models\ListItem;
use Illuminate\Support\Facades\Log;

/**
 *
 * function controls Delete, Open, Close.
 */
class JiraListController extends Controller
{
    const TICKET_Close = 0;
    const TICKET_OPEN = 1;

    public function index() {
        return view('welcome', ['listItems' => ListItem::all(), 'files' => File::all()]);
        //return view('welcome', ['listItems' => ListItem::where('is_open', self::TICKET_OPEN)->get()]);
    }

    /**
     * Marks the ticket as complete using is_open = 1, Todo: create a joined function for marking open/close with the value $complete as a variable?
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function markClose($id) {
        //Log::info($id);

        $ListItem = ListItem::find($id);
        $ListItem->is_open = self::TICKET_Close;
        $ListItem->save();

        return redirect('/');
    }

    /**
     * Marks the ticket as open using is_open = 0
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function markOpen($id) {
        //Log::info($id);

        $ListItem = ListItem::find($id);
        $ListItem->is_open = self::TICKET_OPEN;
        $ListItem->save();

        return redirect('/');
    }

    /**
     * Deletes the ticket off the database.
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function markDelete($id) {
        //Log::info($id);

        $ListItem = ListItem::find($id);
        $ListItem->delete();

        return redirect('/');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editItem($id)
    {
        Log::info($id);
        return view('edititem', ['listItems' => ListItem::where('id', $id)->get(), 'files' => File::all()]);
    }

    /**
     * Saves the item if there is a value. Todo: Show an error to the user if there is no value?
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveItem(Request $request){
       //Log::info(json_encode($request->all()));
        $fileId = $request->fileId;
        if(!isset($request->fileId)){
            $fileId = 0;
        }

       if(!empty($request->title) && !empty($request->description)){
           $newListItem = new ListItem();
           $newListItem->title = $request->title;
           $newListItem->description = $request->description;
           $newListItem->fileId = $fileId;
           $newListItem->is_open = self::TICKET_OPEN;
           $newListItem->save();
       }


       return redirect('/');
   }
}
