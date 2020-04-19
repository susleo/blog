@extends('admin.layouts.app')
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">STILL CONSTRUCTION</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                    </div>
                    <div class="modal-body">
                        STILL CONSTRUCTION WE ARE ON THEY WAY
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-text-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-5 col-sm-12">
                    <div class="mailbox-list">
                        <ul class="list-unstyled">
                            @foreach($contacts as $con)

                            <li>
                                <a data-toggle="tab" href="#men{{$con->id}}">
                                    <div class="mail-checkbox">
                                        <div class="custom-control custom-checkbox form-group">
                                            <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                            <label class="custom-control-label" for="exampleCheck1"></label>
                                        </div>
                                    </div>
                                    <h5 class="mail-author">{{ucfirst($con->first_name)}}</h5>
                                    <h4 class="mail-title">{{$con->subject}}</h4>
                                    <p class="d-sm-none d-md-block mail-text">
                                        {{$con->message }}
                                    </p>
                                    <div class="mail-date">{{$con->email}} </div>
                                </a>
                            </li>

                            @endforeach
                        </ul>
                        {{$contacts->links()}}
                    </div>

                </div>


                <div class="col-lg-9 col-md-7 col-sm-12"  >

                    <div class="tab-content">
                        @foreach($contacts as $con)
                        <div id="men{{$con->id}}" class="tab-pane fade mailbox-view">
                            <div class="mailbox-view-header">
                              <div class="float-left">
                                <span class="mailbox-title">Subject: {{$con->subject}}</span>
                                <span class="mailbox-author">Name: {{$con->first_name}} {{$con->last_name}} </span>
                              </div>
                                <div class="float-right">
                                    <span class="mailbox-title">Email: {{$con->email}}</span>
                                    <br><br>
                                    <form action="{{route('contact.destroy',$con->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="btn btn-text-secondary m-t-xs" data-toggle="modal" data-target="#exampleModal">Reply</a>
                                        <button type="submit"  class="btn btn-text-danger m-t-xs">Delete</button>
                                    </form>
                                </div>
                            </div>

                            <div class="divider mailbox-divider"></div>
                            <div class="mailbox-text">
                                <div class="mailbox-title">Messages</div>
                                <br>
                                <p>{!! $con->messages !!}
                                </p> <div class="divider mailbox-divider"></div>
                            </div>

                           </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div><!-- Page Content -->

</div><!-- App Container -->
@endsection

@section('script')
    <script>
        function messageView(id){
            console.log(id);
            var div = document.getElementById('messageView');
            $("#messageView").attr("hidden",false);
            console.log(div);
            // $('#messageView')
            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'contactDetails',
                data: {'id': id},
                success:function(res)
                {
                    console.log(res);
                    // if(res)
                    // {
                    //     $("messageView").empty();
                    //     $.each(res,function(key,value){
                    //         console.log(key,value);
                    //         $("#section_id").append('<option value="'+key+'">'+value+'</option>');
                    //     });
                    // }
                },error: (error) => {
                    console.log(JSON.stringify(error));
                }

            });

        }
    </script>

    @endsection