<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
  @php
  try {
    $text_logo=App\Models\SiteSetting::first()->text_logo;
  } catch (\Exception $e) {
    $text_logo="";
  }
  try {
      $name=App\Models\SiteSetting::first()->name ??"";
  } catch (\Exception $e) {
      $name="";
  }

  @endphp

  @if ($text_logo)
    <img src="{{request()->root() . '/assets/frontend/images/'.$text_logo}}" class="logo" alt="{{$name}} Logo"  title="{{$name}}">

    @endif

@else
{{ $slot }}
@endif
</a>
</td>
</tr>
