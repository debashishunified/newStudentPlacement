<!DOCTYPE html>
<html>
<head>
  <title>Student Registration</title>
  <style type="text/css">
    body {
      background-color: #9f9da7;
      font-size: 1.6rem;
      font-family: "Open Sans", sans-serif;
      color: #2b3e51;
    }
    h2 {
      font-weight:300;
      text-align:center;
    }
    p {
      position: relative;
    }
    a,
    a:link,
    a:visited,
    a:active {
      color:#3ca9e2;
      transition: all 0.2s ease;
      &:focus,
      &:hover {
        color:#329dd5;
        transition: all 0.2s ease;
      }
    }
    #login-form-wrap {
      background-color: #fff;
      width: 50%;
      margin: 30px auto;
      text-align: center;
      padding:20px 0 0 0;
      border-radius: 4px;
      box-shadow: 0px 30px 50px 0px rgba(0, 0, 0, 0.2);
    }
    #login-form {
      padding:0 40px;
    }
    input, select {
      display: block;
      box-sizing: border-box;
      width: 100%;
      outline: none;
      height: 40px;
      line-height: 60px;
      border-radius: 4px;
    }
    input[type="text"],
    input[type="email"], select{
      width: 100%;
      padding: 0 0 0 10px;
      margin: 0;
      color: #8a8b8e;
      border: 1px solid #c2c0ca;
      font-style: normal;
      font-size: 16px;
      appearance: none;
      position: relative;
      display: inline-block;
      background: none;
      &:focus {
        border-color:#3ca9e2;
        &:invalid  {
          color:#cc1e2b;
          border-color:#cc1e2b;
        }
      }
      &:valid ~ .validation {
        display:block;
        border-color:#0C0;
        span {
          background: #0C0;
          position:absolute;
          border-radius: 6px;
          &:first-child {
            top: 30px;
            left: 14px;
            width: 20px;
            height: 3px;
            transform: rotate(-45deg);
          }
          &:last-child {
            top: 35px;
            left: 8px;
            width: 11px;
            height: 3px;
            transform: rotate(45deg);
          }
        }
      }
    }
    .validation {
      display:none;
      position: absolute;
      content: " ";
      height:60px;
      width:30px;
      right:15px;
      top:0px;
    }

    input[type="submit"] {
      border: none;
      display:block;
      background-color: #3ca9e2;
      color: #fff;
      font-weight: bold;
      text-transform:uppercase;
      cursor: pointer;
      transition: all 0.2s ease;
      font-size: 18px;
      height: 60px;
      position: relative;
      display: inline-block;
      cursor: pointer;
      text-align: center;
      &:hover {
        background-color:#329dd5;
        transition: all 0.2s ease;
      }
    }
    #create-account-wrap {
      background-color:#eeedf1;
      color:#8a8b8e;
      font-size:14px;
      width:100%;
      padding:10px 0;
      border-radius: 0 0 4px 4px;
    }
   .error {
      color: #ff0000ab;
      font-size: 15px;
      float: left;
      margin-top: -24px;
      font-weight: 200;
    }
  </style>
</head>
<body>
    <div id="login-form-wrap">
      <h2>Registration</h2>
      <form id="login-form" method="post" action="{{ url('student/save-registration') }}">
        {{ csrf_field() }}
        <p><input type="text" id="name" name="name" placeholder="Enter name">
        @if($errors->has('name'))
        <h5 class="error">{{ $errors->first('name') }}</h5>
        @endif
      </p>
        

        <p><input type="text" id="roll" name="roll" placeholder="Enter roll">
        @if($errors->has('roll'))
        <h5 class="error">{{ $errors->first('roll') }}</h5>
        @endif
        </p>
        

        <p><select id="department_id" name="department_id">
          <option value="">----Select Department-----</option>
          @forelse($departmentList as $dept_value)
          <option value="{{ $dept_value->id }}"> {{ $dept_value->name }} </option>

          @empty
          <option value="">No Data Found</option>

          @endforelse
        </select>
        @if($errors->has('department_id'))
        <h5 class="error">{{ $errors->first('department_id') }}</h5>
        @endif
        </p>
        

        <p><select id="college_id" name="college_id">
          <option value="">----Select College-----</option>
          @forelse($collegeList as $coll_value)
          <option value="{{ $coll_value->id }}"> {{ $coll_value->name }} </option>

          @empty
          <option value="">No Data Found</option>

          @endforelse
        </select>
        @if($errors->has('college_id'))
        <h5 class="error">{{ $errors->first('college_id') }}</h5>
        @endif
        </p>
        

        <p><input type="submit" id="login" value="Submit"></p>
      </form>
      <div>
        @if(Session::has('message'))
       <p style="font-size: 19px;color: green;"> {{ Session::get('message') }} </p>
        @endif
        </p>
      </div>
      <br>
    </div><!--login-form-wrap-->
</body>
</html>






