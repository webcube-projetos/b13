<div class="row mx-0 justify-content-center mt-5">
  <div>
      <nav class="paginacao">
          <ul class="pagination">
              {{-- <li class="page-item estiloSeta" style="background-color: transparent !important;">
                  <a class="page-link tirar-padding-right clickable estiloSeta" href="#1" style="background-color: transparent !important;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                          <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                      </svg>
                  </a>
              </li>
              <li class="page-item estiloSeta" style="background-color: transparent !important;">
                  <a class="page-link tirar-padding-right clickable estiloSeta" href="#{{ max($paginator->currentPage() - 1, 1) }}" style="background-color: transparent !important;">
                      <svg width="2em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                      </svg>
                  </a>
              </li> --}}
              @php
                  $inicio = max($paginator->currentPage() - 2, 1);
                  $fim = min($paginator->currentPage() + 2, $paginator->lastPage());
              @endphp
              @for ($p = $inicio; $p <= $fim; $p++)
                  <li class="page-item @if ($p == $paginator->currentPage()) active @endif mx-1">
                      <a class="page-link clickable" style="background-color:{{ Session::get('cor') }}" href="#{{ $p }}"> {{ $p }} </a>
                  </li>
              @endfor
              {{-- <li class="page-item estiloSeta" style="background-color: transparent !important;">
                  <a class="page-link tirar-padding-left clickable estiloSeta" href="#{{ min($paginator->currentPage() + 1, $paginator->lastPage()) }}" style="background-color: transparent !important;">
                      <svg width="2em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                      </svg>
                  </a>
              </li>
              <li class="page-item estiloSeta" style="background-color: transparent !important;">
                  <a class="page-link tirar-padding-left clickable estiloSeta" href="#{{ $paginator->lastPage() }}" style="background-color: transparent !important;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                          <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                      </svg>
                  </a>
              </li> --}}
          </ul>
      </nav>
  </div>
</div>