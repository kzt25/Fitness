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
                <button class="tainer-group-chat-name-container" id="group-chat" value="{{$group->id}}">
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

            <div class="group-chat-messages-container">
                <p id="p" style="text-align:center">Choose group and start chatting</p>
                <div class="group-chat-receiver-container" id="text_message">

                </div>
            </div>
            <div id="send_form">

            </div>

            {{-- <form class="group-chat-send-form-container">
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

                    <textarea id="mytextarea"  class="group-chat-send-form-input" placeholder="Message..." required ></textarea>
                    <img class="group-chat-img-preview groupChatImg">
                    <div style="display: none;" class='video-prev'>
                        <video height="200" width="300" class="video-preview" controls="controls"></video>
                    </div>
                    <button type="reset"  class="group-chat-img-cancel" onclick="clearGroupChatImg()">
                        <iconify-icon icon="charm:cross" class="group-chat-img-cancel-icon"></iconify-icon>
                    </button>
                </div>

                <button type="submit" class="group-chat-send-form-submit-btn">
                    <iconify-icon icon="akar-icons:send" class="group-chat-send-form-submit-btn-icon"></iconify-icon>
                </button>
            </form> --}}
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function () {
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
                        var sender=`<form class="group-chat-send-form-container">
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

                                        <textarea id="mytextarea"  class="group-chat-send-form-input" placeholder="Message..." required ></textarea>
                                        <img class="group-chat-img-preview groupChatImg">
                                        <div style="display: none;" class='video-prev'>
                                            <video height="200" width="300" class="video-preview" controls="controls"></video>
                                        </div>
                                        <button type="reset"  class="group-chat-img-cancel" onclick="clearGroupChatImg()">
                                            <iconify-icon icon="charm:cross" class="group-chat-img-cancel-icon"></iconify-icon>
                                        </button>
                                    </div>

                                    <button type="submit" class="group-chat-send-form-submit-btn">
                                        <iconify-icon icon="akar-icons:send" class="group-chat-send-form-submit-btn-icon"></iconify-icon>
                                    </button>
                                </form>`;
                        $('.group-chat-header').html(htmlView);
                        $('#send_form').html(sender);
                        $.each(data.chat_messages, function(key, value) {
                                $('#text_message').append('<img src="{{ asset('image/default.jpg')}}"/>\
                                                            <div class="group-chat-receiver-text-container" >\
                                                            <span>Group Member</span>\
                                                            <p>'+value.messge_body+'</p>\
                                                            </div>')
                            });
                    //
                    //var msg=""
                    // $.each(data.messages, function (key, value) {
                    //    msg=value.messge_body;

                    // msg = '<div class="group-chat-receiver-text-container">' +
                    //         '<span>Group Member</span>' +
                    //             '<p>' +value.messge_body
                    //             '</p>' +
                    //             '</div>';
                    //         });
                    //         $( ".group-chat-receiver-container" ).html( msg );

                    // var view_member_url = '{{route("trainer/view_member", ":id")}}';
                    // view_member_url = view_member_url.replace(':id', data.group_chat.id);
                    // //html = "";
                    //  $(".group-chat-container").html('');

                    // $(".group-chat-container").append('<div class="group-chat-header">\
                    //     <a href="'+view_member_url+'" class="group-chat-header-name-container">\
                    //     <img src=" "/><div class="group-chat-header-name-text-container">'+data.group_chat.group_name+' <p id="group_name">\
                    //     </p><span id="group_member">group member, group member</span>\
                    //     </div></a>\
                    //     <a href="../htmls/trainerTrainingCenterViewMedia.html" class="group-chat-view-midea-link">\
                    //     <p>View Media</p>\
                    //     <iconify-icon icon="akar-icons:arrow-right" class="group-chat-view-midea-link-icon"></iconify-icon>\
                    //     </a>\
                    //     </div>\
                    //     <div class="group-chat-messages-container">\
                    //     <div class="group-chat-receiver-container"> <img src="{{ asset('image/default.jpg')}}"/>\
                    //         <div class="group-chat-receiver-text-container" id="msg">\
                    //             <span>Group Member</span>\
                    //             <p> </p>\
                    //         </div>\
                    //         </div>\
                    //         </div></div>');
                }
            })
        });

    })
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
