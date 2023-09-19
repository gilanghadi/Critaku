<div class="h-96 mt-32">
    <div class="card rounded-md w-1.7/12 mx-2">
        <div class="flex flex-col p-4">
            <h4 class="mb-2 text-gray-600 font-sans text-md font-bold uppercase">Social Media</h4>
            <hr class="mb-4 border-gray-500" width="35%">
            <ul>
                @foreach ($social as $sosmed)
                    <li>
                        <a href="{{ $sosmed->url_social_media }}"
                            class="flex flex-col text-indigo-700 text-sm mb-2 hover:underline"
                            target="_blank">{{ $sosmed->url_social_media }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
