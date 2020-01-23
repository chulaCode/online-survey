@if(Auth::guard('director')->check())

    <span style="color:#32a89a">
    You are logged in as a <strong>DIRECTOR</strong>
    </span>
@endif
@if(Auth::guard('chair')->check())

    <span style="color:#32a89a">
    You are logged in as a <strong>DEPARTMENT CHAIR</strong>
    </span>
@endif
@if(Auth::guard('instructor')->check())

    <span style="color:#32a89a">
    You are logged in as an <strong>INSTRUCTOR</strong>
    </span>
@endif