<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; G-Team
                @if(date('Y', strtotime('now')) != 2021)
                    2021 -
                @endif
                {{ date('Y', strtotime('now'))  }}</span>
        </div>
    </div>
    <span class="float-right text-gray-500 mr-4" style="font-size: 0.7em;">Developed by <strong>Jaroslav Beredi</strong></span>
</footer>
