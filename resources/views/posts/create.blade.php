@extends('layouts.app', ['pageSlug' => 'createpost'])

@section('content')
<div class="row">
    <div class="col-12 createpostform">
        <div class="card card-chart">
            <div class="card-header ">
                 <div class="row">

                            
                    <form class="form" method="post" action="{{route('posts.store')}}" enctype="multipart/form-data" id="createform">
                        <h3>Create Post</h3>
                        @csrf
                            <table>
                                <tr>
                                    <td>
                                        <input type="text" class="form-field posttitle" name="posttitle" placeholder="Enter Title" id="posttile">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="file" class="form-field" name="postimage" id="postimage">
                                    </td>
                                </tr>

                                <tr>
                                    <td><textarea class="form-field" rows="4" cols="50" name="body" id="postbody"></textarea></td>
                                </tr>

                                <tr>
                                    <td><input type="button" name="btnsubmit" class="form-field submitbtn" id="btnpostsubmit" value="POST"></td>
                                </tr>
                            </table>

                    </form>
                       
                </div>
            </div>
        </div>
     </div>
</div>
@endsection

@push('myjs')
    <script src="{{asset('myjs/customjs.js')}}"></script>
@endpush