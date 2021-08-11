@extends('layouts.app', ['pageSlug' => 'editpost'])

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        
                            <h3>Edit Post</h3>
                                <form class="form" method="post" action="{{route('posts.update',$postedit->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                    <table>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-field posttitle" name="posttitle" placeholder="Enter Title" value="{{$postedit->title}}">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="file" class="form-field" name="postimage">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><textarea class="form-field" rows="4" cols="50" name="body">{{$postedit->body}}</textarea></td>
                                        </tr>

                                        <tr>
                                            <td><input type="submit" name="btnsubmit" class="form-field submitbtn" value="Update"></td>
                                        </tr>
                                    </table>

                                </form>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection