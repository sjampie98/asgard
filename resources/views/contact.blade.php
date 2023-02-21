@extends('layouts.app')
@section('style')
    .card-body {
        background: #202028;
        color: white;
    }
    .row {
        width: 100%;
    }

    .text {
        color: white;
    }

    .justify-content-right {
        justify-content: right;
        text-align: right;
        color: white;
    }

    button {
        overflow: visible;
    }

    button, input, select, textarea {
        color: #5A5A5A;
        font: inherit;
        margin: 0;
    }

    input {
        line-height: normal;
    }

    textarea {
        overflow: auto;
    }

    #container {
        max-width: 900px;
        margin: 60px auto;
        max-height: 500px
    }

    form {
        padding: 37.5px;
        margin: 50px 0;
    }

    h1 {
        color: #474544;
        font-size: 32px;
        font-weight: 700;
        letter-spacing: 7px;
        text-align: center;
        text-transform: uppercase;
    }

    .email {
        float: right;
        width: 45%;
    }

    input[type='text'], [type='email'], select, textarea {
        background: none;
        border: none;
        border-bottom: solid 2px #474544;
        color: white;
        font-size: 1.000em;
        letter-spacing: 1px;
        margin: 0em 0 1.875em 0;
        padding: 0 0 0.875em 0;
        width: 100%;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        -o-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    input[type='text']:focus, [type='email']:focus, textarea:focus {
        outline: none;
        padding: 0 0 0.875em 0;
    }

    .message {
        float: none;
    }

    .name {
        float: left;
        width: 45%;
    }

    .subject {
        width: 100%;
    }

    .telephone {
        width: 100%;
    }

    textarea {
        line-height: 150%;
        height: 150px;
        resize: none;
        width: 100%;
    }

    ::-webkit-input-placeholder {
        color: white;
    }

    :-moz-placeholder {
        color: white;
        opacity: 1;
    }

    ::-moz-placeholder {
        color: white;
        opacity: 1;
    }

    :-ms-input-placeholder {
        color: white;
    }

    #form_button {
        background: none;
        border: solid 2px #474544;
        color: white;
        cursor: pointer;
        display: inline-block;
        font-family: 'Helvetica', Arial, sans-serif;
        font-size: 0.875em;
        font-weight: bold;
        outline: none;
        padding: 20px 35px;
        text-transform: uppercase;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    #form_button:hover {
        background: #474544;
        color: white;
    }
@endsection
@section('content')
    <h1 align="center" class="text">Contact us</h1>
    <div id="container">
            <form action="/contact" method="post" id="contact_form">
                @csrf
                <div class="name">
                    <label for="name"></label>
                    <input type="text" placeholder="My name is" name="name" id="name_input" required>
                </div>
                <div class="email">
                    <label for="email"></label>
                    <input type="email" placeholder="My e-mail is" name="email" id="email_input" required>
                </div>
                <div class="telephone">
                    <label for="name"></label>
                    <input type="text" placeholder="My number is" name="telephone" id="telephone_input">
                </div>
                <div class="subject">
                    <label for="subject"></label>
                    <input type="text" placeholder="Subject is" name="subject" id="subject" required>
                </div>
                <div class="message">
                    <label for="message"></label>
                    <textarea name="message" placeholder="I'd like to chat about" id="message_input" cols="30" rows="5" required></textarea>
                </div>
                <div class="submit">
                    <input type="submit" value="Send Message" id="form_button" />
                </div>
            </form><!-- // End form -->
    </div>

    <div class="col-10  justify-content-right">
        <div>
            <h2>Asgard<strong>Render</strong></h2>
            <p class="lead mb-5">{{ $contact->address }}<br>
                Phone: {{ $contact->phone }}
            </p>
        </div>
    </div>
@endsection
