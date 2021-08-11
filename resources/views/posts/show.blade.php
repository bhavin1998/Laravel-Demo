@extends('layouts.app', ['pageSlug' => 'showpost'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <div>
                    <div class="row">
                        
                        <table class="viewpost">
                            <tr>
                                <td><h2>{{$postdisplay->title}}</h2></td>
                            </tr>

                            <tr>
                                <td><img src="{{asset('images')}}/{{$postdisplay->post_image}}" height="500" width="500"></td>
                            </tr>
                           
                            <tr class="card card-header">
                                <td>{{$postdisplay->body}}</td>
                            </tr>
                            
                        </table>

                        <div>
                            <form class="form" method="get" action="{{route('posts.edit',$postdisplay->id)}}" name="editform" id="btneditpost">
                                @csrf
                                <input type="submit" name="editbutton" class="btn btn-primary" value="Edit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection