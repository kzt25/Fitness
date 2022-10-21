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
    @foreach ($groups as $group)
        <div class="modal fade" id="addMemberModal{{ $group->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header  customer-transaction-modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Add Member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="add-member-form" action="">
                            <input type="text" class="form-control mb-3" placeholder="Search employee" id="search">
                            <div class="add-member-rows-container">
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <div class="trainer-two-columns-container">
        <div class="trainer-group-chats-parent-container">
            <p>Groups</p>
            <div class="trainer-group-chats-container">
                @forelse ($groups as $group)
                    <button class="tainer-group-chat-name-container" id="group-chat" value="{{ $group->id }}"
                        data-id="{{ $group->id }}"
                        style=" background-color: transparent;          background-repeat: no-repeat;border: none;cursor: pointer;overflow: hidden;outline: none;">
                        <img src="{{ asset('image/default.jpg') }}" />
                        <p>{{ $group->group_name }}</p>
                    </button>
                @empty
                    <p class="text-secondary p-1">No Group</p>
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
                <div class="trainer-group-chat-media-container">

                </div>
                <div class="group-chat-messages-container ">
                    <div class="group-chat-sender-container" id="trainer_message_el">
                        <p id="p" class="text-secondary p-1" style="text-align:center">Choose group and start
                            chatting</p>

                        <div class="group-chat-sender-text-container" id="send_message">

                        </div>
                        <img src="{{ asset('image/default.jpg') }}" />
                    </div>
                </div>
                <div id="send_form">
                </div>

            </div>
        </div>

        {{-- pop up for video and image  --}}
        @foreach ($messages as $sms)
            <div class="modal fade" id="exampleModalToggle{{ $sms->id }}" aria-hidden="true"
                aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            @if (pathinfo($sms->media, PATHINFO_EXTENSION) == 'mp4')
                                <video class="w-100" controls>
                                    <source src="{{ asset('/storage/trainer_message_media/' . $sms->media) }}"
                                        type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <img src="{{ asset('/storage/trainer_message_media/' . $sms->media) }}" alt="test"
                                    class="w-100">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@push('scripts')
    @if (!empty(Session::get('popup')))
        <script>
            $(document).ready(function() {
                console.log("popup");
                var group_id = localStorage.getItem('group_id');
                $(function() {
                    $('#addMemberModal' + group_id).modal('show');
                });
            });
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('.trainer-group-chat-view-members-header').hide();
            $('.trainer-group-chat-members-container').hide();
            $('.trainer-group-chat-media-container').hide();
            // $('.group-chat-messages-container').hide();
            $(window).on("load", function() {
                $('.group-chat-messages-container').scrollTop($('.group-chat-messages-container')[0]
                    .scrollHeight);
            });
            $(document).on('click', '#group-chat', function(e) {
                e.preventDefault();
                $("#send_message").empty();
                $(".trainer-group-chat-media-container").empty();
                $('#p').hide();
                $('.trainer-group-chat-members-container').hide();
                $('.trainer-group-chat-media-container').hide();
                $('.trainer-group-chat-view-members-header').hide();
                $('.group-chat-messages-container ').show();
                $('#send_form').show();
                // var id=$(this).val();
                var id = $(this).data('id');
                localStorage.setItem('group_id', id);
                $.ajax({
                    type: "GET",
                    url: "trainer/group/show/" + id,
                    datatype: "json",
                    success: function(data) {
                        var view_member_url = '{{ route('trainer/view_member', ':id') }}';
                        view_member_url = view_member_url.replace(':id', data.group_chat.id);
                        var htmlView = `<a href="?id=` + data.group_chat.id + `" class="group-chat-header-name-container" id="add_member">
                                        <img src=" "/><div class="group-chat-header-name-text-container">` + data
                            .group_chat.group_name + `<p id="group_name">
                                        </p><span id="group_member">group member, group member</span>
                                        </div></a>
                                        <a href="" class="group-chat-view-midea-link" id="view_media">
                                        <p>View Media</p>
                                        <iconify-icon icon="akar-icons:arrow-right" class="group-chat-view-midea-link-icon"></iconify-icon>
                                        </a>
                                        `;
                        var sender = `<form class="group-chat-send-form-container" id="trainer_message_form" method="POST">
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
                            console.log(value.text);
                                $('#send_message').append('<p>'+value.text+'</p>');
                            });
                }
            })

        });

        $(document).on('submit','#trainer_message_form', function (e){
                            e.preventDefault();

                            let trainer_message_input=document.querySelector(".trainer_message_input");
                            let group_chat_messages_container = document.querySelector(".group-chat-messages-container");
                            let id = localStorage.getItem('group_id');
                            // console.log(id,"id");
                            const options = {
                                method: "POST",
                                url: "trainer/send/"+id,
                                data: {
                                    text: trainer_message_input.value
                                }
                            }
                            axios(options);
                            trainer_message_input.value='';

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

        $(document).on('click','#add_member', function (e) {
            e.preventDefault();
            $(".trainer-group-chat-view-members-header").empty();
            $(".trainer-group-chat-members-container").empty();
            console.log("header");
            $('#search').on('keyup', function(){
                    search();
                });
                search();

                function search() {
                    var keyword = $('#search').val();
                    var group_id = localStorage.getItem('group_id');
                    console.log("dd", group_id)
                    var search_url = "{{ route('trainer/member/search', ':id') }}";
                    search_url = search_url.replace(':id', group_id);
                    $.post(search_url, {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            keyword: keyword
                        },
                        function(data) {
                            table_post_row(data);
                            console.log(data);
                        });
                }
                // table row with ajax
                function table_post_row(res) {
                    let htmlView = '';
                    if (res.members.length <= 0) {
                        htmlView += `
                       No data found.
                    `;
                    }
                    for (let i = 0; i < res.members.length; i++) {
                        id = res.members[i].id;
                        group_id = localStorage.getItem('group_id');
                        var url = "{{ route('addMember', [':id', ':group_id']) }}";
                        url = url.replace(':id', id);
                        url = url.replace(':group_id', group_id);
                        console.log(url);
                        htmlView += `
                        <div class="add-member-row">
                            <div class="add-member-name-container">
                                <img src="../imgs/avatar.png">
                                <p>` + res.members[i].name + `</p> ${group_id}
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
                $('.trainer-group-chat-media-container').hide();

                $('#send_form').hide();

                var url = new URL(this.href);
                var id = url.searchParams.get("id"); //get-id
                // console.log("group_id",group_id);
                $.ajax({
                    type: "GET",
                    url: "/trainer/view_member/" + id,
                    datatype: "json",
                    success: function(data) {
                        console.log(data.group_members);
                        $.each(data.group_members, function(key, value) {
                            var kick_url = "{{ route('member.kick', ':id') }}";
                            kick_url = kick_url.replace(':id', value.id);

                            $('.trainer-group-chat-members-container').append(`<div class="trainer-group-chat-member-row">\
                                    <div class="trainer-group-chat-member-name">\
                                        <img src="../imgs/avatar.png">\
                                        <p>` + value.name + `</p>\
                                    </div>\
                                    <div class="trainer-group-chat-member-btns-container">\
                                        <a href="#" class="customer-secondary-btn">View Profile</a>\
                                        <a href="` + kick_url + `" class="trainer-group-chat-member-kick-btn customer-red-btn">Kick Member</a>\
                                    </div>\
                                </div>`);
                        });
                    }
                });
                group_id = localStorage.getItem('group_id');
                $('.trainer-group-chat-view-members-header').append('<a class="back-btn">\
                                <iconify-icon icon="bi:arrow-left" class="back-btn-icon"></iconify-icon>\
                            </a>\
                            <div class="trainer-view-members-add-delete-btn-contaier">\
                                <button data-bs-toggle="modal" data-bs-target="#addMemberModal' + group_id + '"  class="trainer-view-members-add-btn">\
                                    <iconify-icon icon="akar-icons:circle-plus" class="trainer-view-members-add-icon"></iconify-icon>\
                                    <p>Add Member</p>\
                                </button>\
                                <form action="{{ route('group.delete') }}">\
                                    <input type ="text" name = "group_id" value="{{ $group->id }}" hidden>\
                                    <button  class="trainer-view-members-delete-btn customer-red-btn">\
                                        Delete Group\
                                    </button>\
                                </form>\
                            </div>');
            })

            $(document).on('click', '#view_media', function(e) {
                e.preventDefault();
                $(".trainer-group-chat-media-container").empty();
                $('.trainer-group-chat-media-container').show();


                group_id = localStorage.getItem('group_id');
                console.log("view_media", group_id);
                $.ajax({
                    type: "GET",
                    url: "/trainer/view_media/" + group_id,
                    datatype: "json",
                    success: function(data) {

                        $.each(data.messages, function(key, value) {
                            fileExtension = value.media.split('.').pop();
                            console.log("Type: " + fileExtension);
                            if (fileExtension === "mp4") {
                                $('.trainer-group-chat-media-container').append(`<div class="trainer-group-chat-media" title="video">\
                                <a  data-bs-toggle="modal" href="#exampleModalToggle` + value.id + `" role="button">\
                                     <video class="w-100">\
                                        <source src="{{ asset('/storage/trainer_message_media/`+value.media+`') }}" type="video/mp4">\
                                     </video>\
                                </a>\
                                </div>`);
                            } else {
                                $('.trainer-group-chat-media-container').append(`<div class="trainer-group-chat-media" title="Photo">\
                                <a  data-bs-toggle="modal" href="#exampleModalToggle` + value.id + `" role="button">\
                                    <img src="{{ asset('/storage/trainer_message_media/`+value.media+`') }}" alt="test">\
                                </a>\
                                </div>`);
                            }

                        });
                    }
                });
                $('.trainer-group-chat-view-members-header').hide();
                $('.trainer-group-chat-members-container').hide();
                $('.group-chat-messages-container').hide();
                $('#send_form').hide();
            })

            // function myFn(){

            // }
        });
    </script>

@endpush
