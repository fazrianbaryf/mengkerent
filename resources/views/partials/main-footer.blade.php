  </div>
    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2024 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>WebApps <span class="text-danger"><i></i></span> by <a
                        href="https://mengkerent.id">mengkerent.id</a></p>
            </div>
        </div>
    </footer>
  </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log("Document loaded"); // Log to ensure script runs
        @if(session('success'))
            console.log("Session success: {{ session('success') }}"); // Debug log
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        @if(session('error'))
            console.log("Session error: {{ session('error') }}"); // Debug log
            Swal.fire({
                title: 'Deleted!',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif

        @if(session('warning'))
            console.log("Session warning: {{ session('warning') }}"); // Debug log
            Swal.fire({
                title: 'Error!',
                text: "{{ session('warning') }}",
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        @endif

        @if(session('info'))
            console.log("Session info: {{ session('info') }}"); // Debug log
            Swal.fire({
                title: 'Info!',
                text: "{{ session('info') }}",
                icon: 'info',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>
  <script src="{{ asset('theme/dist/assets/js/bootstrap.js')}}"></script>
  <script src="{{ asset('theme/dist/assets/js/app.js')}}"></script>
  <script src="{{ asset('theme/dist/assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
  <script src="{{ asset('theme/dist/assets/js/pages/simple-datatables.js')}}"></script>    
  <script src="{{ asset('theme/dist/assets/extensions/sweetalert2/sweetalert2.min.js')}}"></script>
  <script src="{{ asset('theme/dist/assets/js/pages/sweetalert2.js')}}"></script>  

  <!-- Need: Apexcharts -->
  <script src="{{ asset('theme/dist/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('theme/dist/assets/js/pages/dashboard.js')}}"></script>

  </body>

  </html>