@extends('layouts.app', ['pageSlug' => 'viewpost'])

@section('content')
<div class="row">
    <div class="col-12 viewpost">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <form class="form" method="get" action="{{route('posts.create')}}" name="createpost" id="createpostform">
                        <center><input type="submit" class="form-field" id="btncreatepost" name="newpost" value="Create New Post"></center>
                    </form>
                    <center><h3>View Posts</h3></center>

                    <div class="input-group col-md-4">
                        <form class="form-inline searchbox" action="{{ route('search') }}" id="searchpostform">
                            <input class="form-control mr-sm-2" type="text" autocomplete="off" placeholder="Search" id="searchbox" aria-label="Search" name="postsearchbox">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                    <table class="table table-bordered">
                        
                            <tbody>
                                <tr class="tablehead">
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Post Image</th>
                                    <th>Description</th>
                                    <th colspan=2>Action</th>
                                </tr>
                                
                                    @foreach ($posts as $post)
                                        <tr class="tablecontent">
                                            <td><a href="{{route('posts.show',$post->id)}}">{{$post->id}}</a></td>
                                            <td>{{$post->title}}</td>
                                            <td><img src="{{ asset('images') }}/{{$post->post_image}}" height="50" width="50"></td>
                                            <td>{{$post->body}}</td>
                                            <td>
                                                <form class="form editpostform" method="get" action="{{route('posts.edit',$post->id)}}" name="editform">
                                                    @csrf
                                                    <input type="submit" name="editbutton" class="btn btn-primary btnedit" value="Edit" id="editbtn" data-id="{{$post->id}}">
                                                </form>
                                            </td>
                                            <td>
                                                <form class="form deletepostform" method="POST" action="{{route('posts.destroy',$post->id)}}" name="deleteform" id="btndeletepost">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" name="deletebutton" class="btn btn-danger btndelete" value="Delete" id="deletebtn" data-id="{{$post->id}}">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
{{ $posts->links() }}
@endsection

@prepend('myjs')
    <script src="{{asset('myjs/customjs.js')}}"></script>
    
@endprepend
