@extends('trainer.layouts.app')

@section('content')
    @if (Session::has('success'))
        <script>
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
            )
        </script>
    @endif
    <div class="trainer-two-columns-container">
        <div class="trainer-group-chats-parent-container">
            <p>Groups</p>
            <div class="trainer-group-chats-container">
                <!-- <a href="#" class="tainer-group-chat-name-container">
                        <img src="../imgs/avatar.png"/>
                        <p>Group Name</p>
                    </a> -->

                @foreach ($groups as $group)
                    <a class="tainer-group-chat-name-container" id="group-chat" value="{{ $group->id }}">
                        <img src="{{ asset('image/default.jpg') }}" />
                        <p>{{ $group->group_name }}</p>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="group-chat-container">
            <div class="group-chat-header">
                <a href="../htmls/trainerGroupChatViewMembers.html" class="group-chat-header-name-container">
                    <img src="{{ asset('image/default.jpg') }} " />
                    <div class="group-chat-header-name-text-container">
                        <p>Group Name</p>
                        <span>group member, group member,group member,group member,group member,</span>
                    </div>
                </a>

                <a href="../htmls/trainerTrainingCenterViewMedia.html" class="group-chat-view-midea-link">
                    <p>View Media</p>
                    <iconify-icon icon="akar-icons:arrow-right" class="group-chat-view-midea-link-icon"></iconify-icon>
                </a>
            </div>

            <div class="group-chat-messages-container">


                @foreach ($messages as $message)
                    <div class="group-chat-sender-container" id="trainer_message_el">
                        <div class="group-chat-sender-text-container">
                            <p>{{ $message->text }}</p>
                        </div>
                        <img src="{{ asset('image/default.jpg') }}" />
                    </div>
                @endforeach

            </div>

            <form action="{{ route('trainer-send-message') }}" class="group-chat-send-form-container"
                id="trainer_message_form" method="POST">
                @csrf
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

                    <textarea id="mytextarea " name="text" class="group-chat-send-form-input trainer_message_input"
                        placeholder="Message..."></textarea>
                    <img class="group-chat-img-preview groupChatImg">
                    <div style="display: none;" class='video-prev'>
                        <video height="200" width="300" class="video-preview" controls="controls"></video>
                    </div>
                    <button type="reset" class="group-chat-img-cancel" onclick="clearGroupChatImg()">
                        <iconify-icon icon="charm:cross" class="group-chat-img-cancel-icon"></iconify-icon>
                    </button>
                </div>

                <button type="submit" class="group-chat-send-form-submit-btn" id="trainer_send_message_btn">
                    <iconify-icon icon="akar-icons:send" class="group-chat-send-form-submit-btn-icon"></iconify-icon>
                </button>
            </form>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let trainer_message_el = document.getElementById("trainer_message_el");
        let trainer_message_form = document.getElementById("trainer_message_form");
        let trainer_send_message_btn = document.getElementById("trainer_send_message_btn");
        let trainer_message_input = document.querySelector(".trainer_message_input");

        let group_chat_messages_container = document.querySelector(".group-chat-messages-container");

        trainer_message_form.addEventListener('submit', function(e) {
            e.preventDefault();

            //     alert(trainer_message_input.value);
            //    console.log(trainer_message_input.value);
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

        // Echo style
        // Echo.channel('trainer-message')
        //     .listen('TrainingMessageEvent', (e) => {
        //         group_chat_messages_container.innerHTML += `
    //     <div class="group-chat-sender-container" id="trainer_message_el">
    //             <div class="group-chat-sender-text-container">
    //                 <p>${e.message}</p>
    //             </div>
    //             <img src="{{ asset('image/default.jpg') }}" />
    //         </div>`;

        //         console.log(e.message);
        //     })


        // JS
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

        $(document).ready(function() {
                $(window).on("load",function() {
                    $('.group-chat-messages-container').scrollTop($('.group-chat-messages-container')[0].scrollHeight);
                });


        $(document).on('click','#group-chat', function (e) {
            var id=$(this).val();
            $.ajax({
                type:"GET",
                url:"trainer/group/show/"+id,
                datatype:"json",

                success:function(data){
                    $.each(data.messages, function (key, value) {
                       msg=value.messge_body;
                    //  $("#hh").append('<div class="group-chat-receiver-text-container">\
                    //             <span>Group Member</span>\
                    //             <p>'+value.messge_body+'</p>\
                    //         </div>')
                    var html = '<div class="group-chat-receiver-text-container">' +
                                '<span>Group Member</span>' +
                                    '<p>' +value.messge_body
                                    '</p>' +
                                    '</div>';
                    //$('#hh').append(html);

                    var view_member_url = '{{route("trainer/view_member", ":id")}}';
                    view_member_url = view_member_url.replace(':id', data.group_chat.id);
                    html = "";
                     $(".group-chat-container").html('');

                    $(".group-chat-container").append('<div class="group-chat-header">\
                        <a href="'+view_member_url+'" class="group-chat-header-name-container">\
                        <img src=" "/><div class="group-chat-header-name-text-container">'+data.group_chat.group_name+' <p id="group_name">\
                        </p><span id="group_member">group member, group member</span>\
                        </div></a>\
                        <a href="../htmls/trainerTrainingCenterViewMedia.html" class="group-chat-view-midea-link">\
                        <p>View Media</p>\
                        <iconify-icon icon="akar-icons:arrow-right" class="group-chat-view-midea-link-icon"></iconify-icon>\
                        </a>\
                        </div>\
                        <div class="group-chat-messages-container">\
                        <div class="group-chat-receiver-container"> <img src="{{ asset('image/default.jpg')}}"/>\
                            <div class="group-chat-receiver-text-container">\
                                <span>Group Member</span>\
                                <p></p>\
                            </div>\
                            </div>\
                            </div></div>');
                        });
                }
            })
        });

    })
    </script>
@endpush
