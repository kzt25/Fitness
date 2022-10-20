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

            @forelse ($groups as $group)
                <button class="tainer-group-chat-name-container" id="group-chat" value="{{$group->id}}" style=" background-color: transparent;background-repeat: no-repeat;border: none;cursor: pointer;overflow: hidden;outline: none;">
                    <img src="{{ asset('image/default.jpg')}}"/>
                    <p>{{$group->group_name}}</p>
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

            {{-- <div class="group-chat-messages-container">

                <p id="p" style="text-align:center">Choose group and start chatting</p>
                <div class="group-chat-sender-container" id="trainer_message_el">

                </div>
            </div> --}}
            <div class="group-chat-messages-container">
                <div class="group-chat-sender-container" id="trainer_message_el">
                    <p id="p" style="text-align:center">Choose group and start chatting</p>
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
<script>

    $(document).ready(function () {
        $(window).on("load",function() {
                    $('.group-chat-messages-container').scrollTop($('.group-chat-messages-container')[0].scrollHeight);
                });
        $(document).on('click','#group-chat', function (e) {
            $('#p').hide();
            var id=$(this).val();
            $.ajax({
                type:"GET",
                url:"trainer/group/show/"+id,
                datatype:"json",

                success:function(data){

                    var view_member_url = '{{route("trainer/view_member", ":id")}}';
                    view_member_url = view_member_url.replace(':id', data.group_chat.id);
                        var htmlView = `<a href="`+view_member_url+`" class="group-chat-header-name-container">
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
                    console.log('sdddd');
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

        });

    });



</script>

    {{-- <script>
        $(document).ready(function() {
        @if (Session::has('success'))
                Toast.fire({
                    icon: 'success',
                    title: '{{ Session::get('success') }}'
                })
            @endif
        })
    </script> --}}
@endpush
