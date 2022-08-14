<style>
    input {
        display: block;
    }
</style>

<h1 style="text-align: center">Feedback</h1>

<form method="post" action="{{ route('feedback.send') }}">
    @csrf

    <input name="name" placeholder="Type your name">
    @error('name')
        <p style="color: darkred">{{ $message }}</p>
    @enderror

    <input name="email" type="email" placeholder="Type your email">
    @error('email')
    <p style="color: darkred">{{ $message }}</p>
    @enderror

    <input name="title" placeholder="Type your title">
    @error('title')
    <p style="color: darkred">{{ $message }}</p>
    @enderror

    <textarea name="message" placeholder="Type your message"></textarea>
    @error('message')
    <p style="color: darkred">{{ $message }}</p>
    @enderror

    <input type="submit" value="Send">
</form>
