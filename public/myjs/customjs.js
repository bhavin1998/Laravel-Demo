$(document).ready(function(){

    // openSelect();

    $("#btncreatepost").click(function(e){
        e.preventDefault();

        $.ajax({
            url: $("#createpostform").attr('action'),
            method: 'GET',
            data: $("#createpostform").serialize(),
            success: function(response){
                // alert (data);
                $("body").replaceWith(response);
                // $("html").html(response);
            }
        });
    });

    $('#btnpostsubmit').click(function(e){
        e.preventDefault();
        $a = $('#createform').attr('action');
    
        var form = $('#createform')[0];
        var formdata = new FormData(form);

        //alert (formdata);
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: $('#createform').attr('action'),
            method: 'POST',
            dataType: 'JSON',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data){
                alert("success");
                console.log(data);
            }
        });
    });

    $(".editpostform").on("submit",function(e){
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: 'GET',
            success: function(response){
                //alert ("success");
                $("body").replaceWith(response);
                // $("html").html(response);
            }
        });
    });

    $('#searchbox').keyup(function(){
        var str = $('#searchbox').val();
        //

        if(str == ''){            
        }
        else{
                $.ajax({
                    url: $('#searchpostform').attr('action'),
                    method: 'GET',
                    data: {'search':str},
                    success: function(data){
                        //$('tbody').remove();
                        $('tbody').html(data);
                        //alert();
                    }
                });
        }
    });

    $(document).on("change","#userrole",function(){
        //alert();
        $(this).select();
        var roleid = $(this).val();

        if(roleid == 1){
            //alert ("1");
            // alert("1");
            $.ajax({
                url: "users/admindata",
                dataType: "html",
                cache: false,
                success: function(response){
                    $("html").html(response);
                    //$('#userrole option[value=1]').attr("selected","selected");
                }
            }); 
        }
        if(roleid == 2){
            $.ajax({
                url: "users/userdata",
                dataType: 'html',
                cache:false,
                success: function(response){
                    $("html").html(response);
                    // $("select option[value='2']").attr("selected","selected");
                }
            });
            // .done(function(){
            //     alert("ajax done")
            // });
        }
    });
    $('#btnadduser').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "users/registration",
            dataType: 'html',
            success: function(response){
                $("body").replaceWith(response);
            }
        });
    });

    $(document).on("click","#profileimg",function(){
        $("#openprofileupload").trigger("click");
        $(document).on("change","#openprofileupload",function(){
            profileimg.src=URL.createObjectURL(event.target.files[0]);
        });

    });
});