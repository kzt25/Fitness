@extends('trainer.layouts.app')

@section('content')
@include('sweetalert::alert')
    @if (Session::has('success'))
        <script>
            Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
            )
        </script>
    @endif
    {{-- @include('trainer.trainer_groups') --}}

    <!--add member modal-->
    <div class="modal fade" id="addMemberModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header  customer-transaction-modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Add Member</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="add-member-form" action="">
                <input type="text" class="form-control mb-3"   placeholder="Search employee" id="search">
                <div class="add-member-rows-container">
                    {{-- @foreach($member as $memb)
                    <div class="add-member-row">
                        <div class="add-member-name-container">
                            <img src="../imgs/avatar.png">
                            <p>{{$memb->name}}</p>
                        </div>
                        <div class="add-member-row-btns-container">
                            <label class="add-member-checkbox">
                                <a href = "{{route('addMember',$memb->id)}}"><p>Add</p></a>
                            </label>
                            <a href="#" class="customer-secondary-btn add-member-view-profile-btn">View Profile</a>
                        </div>
                    </div>
                    @endforeach --}}
                </div>
                {{--
                <div class="create-group-form-btns-contaier">
                    <button type="submit" class="customer-primary-btn">Confirm</button>
                    <button type="reset" class="customer-secondary-btn" onclick="uncheckAddMemberBoxes()">Cancel</button>
                </div> --}}
            </form>

            </div>

        </div>
        </div>
    </div>
    <div id = "nogroup">
        <p class="text-secondary p-1">No Group</p>
        </div>
    <div class="trainer-two-columns-container">
        <div class="trainer-group-chats-parent-container">
            <p>Groups</p>
            <div class="trainer-group-chats-container">
                @forelse ($groups as $group)
                    <button class="tainer-group-chat-name-container" id="group-chat" value="{{$group->id}}" style=" background-color: transparent;background-repeat: no-repeat;border: none;cursor: pointer;overflow: hidden;outline: none;">
                        <img src="{{ asset('image/default.jpg')}}"/>
                        <p>{{$group->group_name}}</p>
                    </button>
                @empty
                <div id = "">
                <p class="text-secondary p-1">No Group</p>
                </div>
                @endforelse
            </div>
        </div>
        <div id="content-container">

            <div class="group-chat-container">
                <div class="group-chat-header">

                </div>
                <div class="trainer-group-chat-view-members-header">

                </div>
                <div class="trainer-group-chat-members-container">

                </div>
                <div class="group-chat-messages-container " >
                    <div class="group-chat-sender-container" id="trainer_message_el">
                        <p id="p" class="text-secondary p-1" style="text-align:center">Choose group and start chatting</p>

                        <div class="group-chat-sender-text-container" id="send_message">

                        </div>
                        <img src="{{ asset('image/default.jpg') }}" />
                    </div>
                </div>
                <div id="send_form">

                </div>

            </div>
        </div>
    </div>

@endsection
@push('scripts')
@if(!empty(Session::get('popup')))
        <script>
        $(document).ready(function () {
            console.log("popup");
          $(function() {
            $('#addMemberModal').modal('show');
          });
        });
       </script>
        @endif
<script>

    $(document).ready(function () {
            $('.trainer-group-chat-view-members-header').hide();
            $('.trainer-group-chat-members-container').hide();
            $('#nogroup').hide();
            // $('.group-chat-messages-container').hide();
        $(window).on("load",function() {
                    $('.group-chat-messages-container').scrollTop($('.group-chat-messages-container')[0].scrollHeight);
                });
        $(document).on('click','#group-chat', function (e) {
            e.stopPropagation();

            $('#p').hide();
            $('.trainer-group-chat-view-members-header').hide();
            $('.trainer-group-chat-members-container').hide();

            var id=$(this).val();
            $.ajax({
                type:"GET",
                url:"trainer/group/show/"+id,
                datatype:"json",

                success:function(data){

                    var view_member_url = '{{route("trainer/view_member", ":id")}}';
                    view_member_url = view_member_url.replace(':id', data.group_chat.id);
                        var htmlView = `<a href="?id=`+data.group_chat.id+`" class="group-chat-header-name-container" id="add_member">
                                        <img src=" "/><div class="group-chat-header-name-text-container">`+data.group_chat.group_name+`<p id="group_name">
                                        </p><span id="group_member">group member, group member</span>
                                        </div></a>
                                        <a href="../htmls/trainerTrainingCenterViewMedia.html" class="group-chat-view-midea-link">
                                        <p>View Media</p>
                                        <iconify-icon icon="akar-icons:arrow-right" class="group-chat-view-midea-link-icon"></iconify-icon>
                                        </a>
                                        `;
                        var sender=`<form class="group-chat-send-form-container" id="trainer_message_form" method="POST">
                                    <div class="group-chat-send-form-message-parent-container">
                                        <div class="group-chat-send-form-img-emoji-container">
                                            <label class="group-chat-send-form-img-contaier">
                                                <iconify-icon icon="bi:images" class="group-chat-send-form-img-icon">

                                                </iconify-icon>
                                                <input type="file" id="groupChatImg" name="groupChatImg">
                                            </label>
                                            <button type="button" id="emoji-button" class="emoji-trigger">
                                                <iconify-icon icon="bi:emoji-smile" class="group-chat-send-form-emoji-icon"></iconify-icon>
                                            </button>

                                        </div>

                                        <textarea id="mytextarea" name="text" class="group-chat-send-form-input trainer_message_input" placeholder="Message..." required ></textarea>
                                        <img class="group-chat-img-preview groupChatImg">
                                        <div style="display: none;" class='video-prev'>
                                            <video height="200" width="300" class="video-preview" controls="controls"></video>
                                        </div>
                                        <button type="reset"  class="group-chat-img-cancel" onclick="clearGroupChatImg()">
                                            <iconify-icon icon="charm:cross" class="group-chat-img-cancel-icon"></iconify-icon>
                                        </button>
                                    </div>

                                    <button type="submit" class="group-chat-send-form-submit-btn" id="sendd">
                                        <iconify-icon icon="akar-icons:send" class="group-chat-send-form-submit-btn-icon"></iconify-icon>
                                    </button>
                                </form>`;
                        $('.group-chat-header').html(htmlView);
                        $('#send_form').html(sender);
                        $.each(data.chat_messages, function(key, value) {
                                $('#send_message').append('<p>'+value.text+'</p>');
                                // $('.group-chat-sender-container').append('<div class="group-chat-sender-text-container">\
                                //                             <p>'+value.messge_body+'</p>\
                                //                             <img src="{{ asset('image/default.jpg') }}" />\
                                //                             </div>')
                            });
                }
            })
            $(document).on('submit','#trainer_message_form', function (e){
                    e.preventDefault();
                    var trainer_message_input=$(".trainer_message_input").val();

                    console.log(trainer_message_input);
                    const options = {
                        method: "POST",
                        url: "trainer/send",
                        data: {
                            text: trainer_message_input
                        }
                    }
                    axios(options);


                    Pusher.logToConsole = true;
                    var pusher = new Pusher('6c07a0a51a0f074bcdf0', {
                        cluster: 'us2'
                    });

                    var channel = pusher.subscribe('trainer-message');
                    channel.bind('training_message_event', function(data) {
                        group_chat_messages_container.innerHTML += `
                    <div class="group-chat-sender-container" id="trainer_message_el">
                            <div class="group-chat-sender-text-container">
                                <p>${data.message}</p>
                            </div>
                            <img src="{{ asset('image/default.jpg') }}" />
                        </div>`;
                    });

                });

            let trainer_message_el = document.getElementById("trainer_message_el");
            let trainer_message_form = document.getElementById("trainer_message_form");
            let trainer_send_message_btn = document.getElementById("trainer_send_message_btn");
            let trainer_message_input = document.querySelector(".trainer_message_input");

            let group_chat_messages_container = document.querySelector(".group-chat-messages-container");
            trainer_message_form.addEventListener('submit', function(e) {
                e.preventDefault();

                    //alert(trainer_message_input.value);
                console.log(trainer_message_input.value);
                const options = {
                    method: "POST",
                    url: "trainer/send",
                    data: {
                        text: trainer_message_input.value
                    }
                }
                axios(options);
                trainer_message_input.value = "";
            });
            Pusher.logToConsole = true;

            var pusher = new Pusher('6c07a0a51a0f074bcdf0', {
                cluster: 'us2'
            });
            var channel = pusher.subscribe('trainer-message');
            channel.bind('training_message_event', function(data) {
                group_chat_messages_container.innerHTML += `
            <div class="group-chat-sender-container" id="trainer_message_el">
                    <div class="group-chat-sender-text-container">
                        <p>${data.message}</p>
                    </div>
                    <img src="{{ asset('image/default.jpg') }}" />
                </div>`;
            });
            return false;
        });
        $(document).on('click','#add_member', function (e) {

            e.preventDefault();

            $('#search').on('keyup', function(){
                    search();
                });
                search();
                function search(){
                    var keyword = $('#search').val();
                    if(localStorage.getItem('group_id') === null){
                        $('#nogroup').show();
                    }
                    else{
                    var group_id = localStorage.getItem('group_id');
                    var search_url = "{{ route('trainer/member/search',':id') }}";
                    search_url = search_url.replace(':id', group_id);
                    $.post(search_url,
                    {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        keyword:keyword
                    },
                    function(data){
                        table_post_row(data);
                        console.log(data);
                    });
                    }

                }
                // table row with ajax
                function table_post_row(res){
                let htmlView = '';
                if(res.members.length <= 0){
                    htmlView+= `
                       No data found.
                    `;
                }
                for(let i = 0; i < res.members.length; i++){
                    id = res.members[i].id;
                    group_id = {{$group->id}};

                    var url = "{{ route('addMember',[':id',':group_id']) }}";
                    url = url.replace(':id', id);
                    url = url.replace(':group_id', group_id);
                    // console.log(url);
                    htmlView += `
                        <div class="add-member-row">
                            <div class="add-member-name-container">
                                <img src="../imgs/avatar.png">
                                <p>`+res.members[i].name+`</p>
                            </div>
                            <div class="add-member-row-btns-container">
                                <label class="add-member-checkbox">

                                    <a href = ${url} ><p>Add</p></a>
                                </label>
                                <a href="#" class="customer-secondary-btn add-member-view-profile-btn">View Profile</a>

                            </div>
                        </div>
                `
                }
                    $('.add-member-rows-container').html(htmlView);
                }

            $('.trainer-group-chat-view-members-header').show();
            $('.trainer-group-chat-members-container').show();
            $('.group-chat-messages-container').hide();
            $('#send_form').hide();

            var url = new URL(this.href);
            var id = url.searchParams.get("id"); //get-id
            console.log(id);
            $.ajax({
                type:"GET",
                url:"/trainer/view_member/"+id,
                datatype:"json",

                success:function(data){
                    console.log(data.group_members);
                    $.each(data.group_members, function(key, value) {
                        var kick_url = "{{ route('member.kick',':id') }}";
                        kick_url = kick_url.replace(':id', value.id);

                            $('.trainer-group-chat-members-container').append(`<div class="trainer-group-chat-member-row">\
                                    <div class="trainer-group-chat-member-name">\
                                        <img src="../imgs/avatar.png">\
                                        <p>`+value.name+`</p>\
                                    </div>\
                                    <div class="trainer-group-chat-member-btns-container">\
                                        <a href="#" class="customer-secondary-btn">View Profile</a>\
                                        <a href="`+kick_url+`" class="trainer-group-chat-member-kick-btn customer-red-btn">Kick Member</a>\
                                    </div>\
                                </div>`);
                        });
                }
            });

            $('.trainer-group-chat-view-members-header').append('<a class="back-btn">\
                        <iconify-icon icon="bi:arrow-left" class="back-btn-icon"></iconify-icon>\
                    </a>\
                    <div class="trainer-view-members-add-delete-btn-contaier">\
                        <button data-bs-toggle="modal" data-bs-target="#addMemberModal"  class="trainer-view-members-add-btn">\
                            <iconify-icon icon="akar-icons:circle-plus" class="trainer-view-members-add-icon"></iconify-icon>\
                            <p>Add Member</p>\
                        </button>\
                        <form action="{{route('group.delete')}}">\
                            <input type ="text" name = "group_id" value="{{$group->id}}" hidden>\
                            <button  class="trainer-view-members-delete-btn customer-red-btn">\
                                Delete Group\
                            </button>\
                        </form>\
                    </div>');

        })

    });

</script>

@endpush
