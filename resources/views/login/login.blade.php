<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


</head>
<body>
<div class="">
    <div class="">
        <form method="post" action="">
            <div class="" style="text-align: center;margin-top: 20%; margin-bottom: 30px;">
                <label>
                    <span>账号</span>
                    <input type="text" name="username" />
                </label>
            </div>
            <div class="" style="text-align: center;margin-bottom: 30px;">
                <span>密码</span>
                <label>
                    <input type="password" name="password" />
                </label>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>

            <div class="" style="text-align: center;margin-bottom: 30px;">
                <input type="submit"  name="submit" value="提交"/>
            </div>
        </form>
    </div>
</div>
</body>
</html>
