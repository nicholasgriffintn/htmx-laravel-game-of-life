<table>
  <tbody>
      @foreach ($board_state as $x => $row)
          <tr>
              @foreach ($row as $y => $cell)
                  <td>
                      @if ($cell)
                          <a href="{{route('toggle', ['x' => $x, 'y' => $y])}}">
                              <div class="bg-black p-2"></div>
                          </a>
                      @else
                          <a href="{{route('toggle', ['x' => $x, 'y' => $y])}}">
                              <div class="bg-white p-2"></div>
                          </a>
                      @endif
                  </td>
              @endforeach
          </tr>
      @endforeach
  </tbody>
</table>