{{--블레이드 주석 안에서 {{ $name}}을(를) 출력합니다. --}}
<h1>{{ $greeting or 'Hello ' }} {{ $name or '' }}</h1>