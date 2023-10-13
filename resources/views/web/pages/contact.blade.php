@php use Illuminate\Support\Facades\Auth; @endphp
@extends('web.layout.index')
@section('support')
active link-danger
@endsection
@section('css')
    .form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    position: relative;
    }

    .message {
    color: rgba(88, 87, 87, 0.822);
    font-size: 14px;
    }

    .flex {
    display: flex;
    width: 100%;
    gap: 6px;
    }

    .form label {
    position: relative;
    }

    .form label .input {
    width: 100%;
    padding: 10px 10px 20px 10px;
    outline: 0;
    border: 1px solid rgba(105, 105, 105, 0.397);
    border-radius: 5px;
    }

    .form label .input + span {
    position: absolute;
    left: 10px;
    top: 15px;
    color: grey;
    font-size: 0.9em;
    cursor: text;
    transition: 0.3s ease;
    }

    .form label .input:placeholder-shown + span {
    top: 15px;
    font-size: 0.9em;
    }

    .form label .input:focus + span,.form label .input:valid + span {
    top: 30px;
    font-size: 0.7em;
    font-weight: 600;
    }

    .form label .input:valid + span {
    color: green;
    }

    .input01 {
    width: 100%;
    padding: 10px 10px 20px 10px;
    outline: 0;
    border: 1px solid rgba(105, 105, 105, 0.397);
    border-radius: 5px;
    }

    .form label .input01 + span {
    position: absolute;
    left: 10px;
    top: 50px;
    color: grey;
    font-size: 0.9em;
    cursor: text;
    transition: 0.3s ease;
    }

    .form label .input01:placeholder-shown + span {
    top: 40px;
    font-size: 0.9em;
    }

    .form label .input01:focus + span,.form label .input01:valid + span {
    top: 50px;
    font-size: 0.7em;
    font-weight: 600;
    }

    .form label .input01:valid + span {
    color: green;
    }

    .fancy {
    background-color: transparent;
    border: 2px solid #cacaca;
    border-radius: 0px;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-weight: 390;
    letter-spacing: 2px;
    margin: 0;
    outline: none;
    overflow: visible;
    padding: 8px 30px;
    position: relative;
    text-align: center;
    text-decoration: none;
    text-transform: none;
    transition: all 0.3s ease-in-out;
    user-select: none;
    font-size: 13px;
    }

    .fancy::before {
    content: " ";
    width: 1.7rem;
    height: 2px;
    background: #cacaca;
    top: 50%;
    left: 1.5em;
    position: absolute;
    transform: translateY(-50%);
    transform: translateX(230%);
    transform-origin: center;
    transition: background 0.3s linear, width 0.3s linear;
    }

    .fancy .text {
    font-size: 1.125em;
    line-height: 1.33333em;
    padding-left: 2em;
    display: block;
    text-align: left;
    transition: all 0.3s ease-in-out;
    text-transform: lowercase;
    text-decoration: none;
    color: #818181;
    transform: translateX(30%);
    }

    .fancy .top-key {
    height: 2px;
    width: 1.5625rem;
    top: -2px;
    left: 0.625rem;
    position: absolute;
    background: white;
    transition: width 0.5s ease-out, left 0.3s ease-out;
    }

    .fancy .bottom-key-1 {
    height: 2px;
    width: 1.5625rem;
    right: 1.875rem;
    bottom: -2px;
    position: absolute;
    background: white;
    transition: width 0.5s ease-out, right 0.3s ease-out;
    }

    .fancy .bottom-key-2 {
    height: 2px;
    width: 0.625rem;
    right: 0.625rem;
    bottom: -2px;
    position: absolute;
    background: white;
    transition: width 0.5s ease-out, right 0.3s ease-out;
    }

    .fancy:hover {
    color: white;
    background: #cacaca;
    }

    .fancy:hover::before {
    width: 1.5rem;
    background: white;
    }

    .fancy:hover .text {
    color: white;
    padding-left: 1.5em;
    }

    .fancy:hover .top-key {
    left: -2px;
    width: 0px;
    }

    .fancy:hover .bottom-key-1,
    .fancy:hover .bottom-key-2 {
    right: 0;
    width: 0;
    }
@endsection
@section('content')
    <section class="container-lg clearfix py-5">
        <h2 class="text-center my-4">@lang('lang.contact')</h2>
        <div class="row">
            <div class="col-6">
                <div class="form justify-content-center">
                    @csrf
                    <div class="mb-3">
                        <label for="fullname" class="form-label">@lang('lang.fullname')</label>
                        <input type="text" class="form-control" id="fullname" name="fullName" placeholder="@lang('lang.fullname')">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">@lang('lang.phone')</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">@lang('lang.message')</label>
                        <textarea class="form-control input01 message_feedback" id="message" name="message" rows="3"></textarea>
                    </div>
                    <a class="fancy feedback" href="javascript:void(0)" type="button">
                        <span class="top-key"></span>
                        <span class="text ">@lang('lang.send')</span>
                        <span class="bottom-key-1"></span>
                        <span class="bottom-key-2"></span>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="rounded overflow-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.9459979854155!2d106.67781657573566!3d10.738645559888056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fac4c2ec679%3A0x1b72da582829a169!2zMTgwIMSQLiBDYW8gTOG7lywgUGjGsOG7nW5nIDQsIFF14bqtbiA4LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1697044532531!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.feedback').on('click', function () {
                var message =  $('.message_feedback').val();
                if (confirm("Thông tin của bạn sẽ được ghi nhận vào hệ thống, bạn có chắc muốn gửi ?") === true) {
                    $.ajax({
                        url: '/feedback',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            'fullName': $('#fullname').val(),
                            'email': $('#email').val(),
                            'phone': $('#phone').val(),
                            'message': message,
                        },
                        success: function (data) {
                            if (data['success']) {
                                alert(data.success);
                                window.location.href ="/";
                            } else if (data['error']) {
                                alert(data.error);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
