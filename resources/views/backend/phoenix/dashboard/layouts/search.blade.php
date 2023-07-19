<table width="60%">
    <tr>
        <td width="10%">
            <div class="search-box navbar-top-search-box d-none d-lg-block" data-list='{"valueNames":["title"]}'
                style="width:20rem;">
                <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                        class="form-control search-input fuzzy-search rounded-pill form-control-sm" type="search"
                        placeholder="Search..." aria-label="Search">
                    <span class="fas fa-search search-box-icon"></span>
                </form>
            </div>
        </td>
        <td width="20%">
            <p>
                <strong>
                    <h5>
                        <font color="blue">
                            <script language='JavaScript'>
                            document.write(tanggallengkap);
                            </script>
                        </font>
                        <font color="black">
                            <span id="txt"></span>
                        </font>
                    </h5>
                </strong>
            </p>
        </td>
        <td width="20%">
            <strong>
                <h5>
                    <font color="black">
                        <code>Last login : {{$user->last_login}}</code>
                    </font>
                </h5>
            </strong>
        </td>
    </tr>
</table>