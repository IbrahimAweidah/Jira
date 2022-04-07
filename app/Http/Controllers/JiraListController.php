<?php

namespace App\Http\Controllers;

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
        return view('welcome', ['listItems' => ListItem::all()]);
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
     * Saves the item if there is a value. Todo: Show an error to the user if there is no value?
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveItem(Request $request){
       //Log::info(json_encode($request->all()));

       if(!empty($request->title) && !empty($request->description)){
           $newListItem = new ListItem();
           $newListItem->title = $request->title;
           $newListItem->description = $request->description;
           $newListItem->is_open = self::TICKET_OPEN;
           $newListItem->save();
       }


       return redirect('/');
   }
}
