<table id="board">
  <tbody>
      @foreach ($board_state as $x => $row)
          <tr>
              @foreach ($row as $y => $cell)
                  <td>
                      @if ($cell)
                            <button
                                hx-post="{{route('toggle', ['x' => $x, 'y' => $y])}}"
                                hx-target="#board"
                                hx-swap="outerHTML"
                            >
                              <div class="bg-black p-2"></div>
                            </button>
                      @else
                            <button
                                hx-post="{{route('toggle', ['x' => $x, 'y' => $y])}}"
                                hx-target="#board"
                                hx-swap="outerHTML"
                            >
                              <div class="bg-white p-2"></div>
                          </button>
                      @endif
                  </td>
              @endforeach
          </tr>
      @endforeach
  </tbody>
</table>