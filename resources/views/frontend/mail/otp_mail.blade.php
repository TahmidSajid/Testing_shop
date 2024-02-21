<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
    <div style="margin:50px auto;width:70%;padding:20px 0">
      <div style="border-bottom:1px solid #eee">
        <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Your Brand</a>
      </div>
      <p style="font-size:1.1em">Hi,</p>
      <p>Your name updated from <span style="font-weight: bold">{{ $previous_info->name }}</span> to <span style="font-weight: bold">{{ $updated_info->name }}</span></p>
      <p>Your email updated from <span style="font-weight: bold">{{ $previous_info->email }}</span> to <span style="font-weight: bold">{{ $updated_info->email }}</span></p>
      <p>Your phone number updated from <span style="font-weight: bold">{{ $previous_info->number }}</span> to <span style="font-weight: bold">{{ $updated_info->phone_number }}</span></p>
      <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">{{ $otp }}</h2>
      <p style="font-size:0.9em;">Regards,<br />Your Brand</p>
      <hr style="border:none;border-top:1px solid #eee" />
      <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
        <p>Your Brand Inc</p>
        <p>1600 Amphitheatre Parkway</p>
        <p>California</p>
      </div>
    </div>
  </div>
