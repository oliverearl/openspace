<aside>
    <div class="general-about home-actions">
        <div class="heading">
            <h1 style="margin: 0">
                Hello {{ $user->name }}!
            </h1>
        </div>

        <div class="inner">
            <br />
            <div class="profile-pic">
                <img src="" alt="{{ $user->name }}" width="235px" />
            </div>

            <div class="details">
                <p><a href="">Edit Profile</a></p>
                <p><a href="">Edit Status</a></p>
                <p><a href="">Account Settings</a></p>
            </div>

            <div class="more-options">
                <p>
                    View my:
                    <a href="">Profile</a> |
                    <a href="">Blog</a> |
                    <a href="">Bulletins</a> |
                    <a href="">Friends</a> |
                    <a href="">Requests</a>
                </p>

                <p>
                    My URL:
                </p>
            </div>
        </div>
    </div>

    <div class="url-info view-full-profile">
        <p>
            <a href="">View your profile</a>
        </p>
    </div>
</aside>
