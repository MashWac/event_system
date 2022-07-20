@extends('layouts.organisers')
@section('content')
<h1>This is the event organisers home page</h1>
{{$data['totalsales']}}
{{$data['totalticketsold']}}
{{$data['gendermaledemographics']}}
{{$data['genderfemaledemographics']}}
<?php print_r('$data["genders"]')?>

@endsection




