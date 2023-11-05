<table id="board">
  <tbody>
      @foreach ($board_state as $x => $row)
          <tr>
              @foreach ($row as $y => $cell)
                  <td>
                    <button
                        hx-post="{{route('toggle', ['x' => $x, 'y' => $y])}}"
                        hx-target="#board"
                        hx-swap="outerHTML"
                    >
                        @if ($cell)
                            <div class="bg-black p-2"></div>
                        @else
                            <div class="bg-white p-2"></div>
                        @endif
                    </button>
                  </td>
              @endforeach
          </tr>
      @endforeach
  </tbody>
</table>