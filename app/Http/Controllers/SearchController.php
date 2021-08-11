<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class SearchController extends Controller
{
    public function search(Request $request){
        $output = '';
        $query = $request->get('postsearchbox');
        $data = post::where('title','like','%'.$request->postsearchbox.'%')->get();

        if(count($data)>0) {
            $output = '<table>
                        <thead>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                        </thead>
                            <tbody>';
                                foreach($data as $row){
                                    $output .= '
                                    <tr>
                                        <td>'.$row->id.'</td>
                                        <td>'.$row->title.'</td>
                                        <td></td>
                                        <td>'.$row->body.'</td>
                                    </tr>
                                    ';
                                    }
                                $output .= '
                            </tbody>
                        </table>';
            }
        else {
            $output .= '<li class="list-group-item">'.'No results'.'</li>';
        }
        return $output;
    }
}
