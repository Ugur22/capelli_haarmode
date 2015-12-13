<h1>Video</h1>
{% for video in user %}

    <h2><a href="video/{{ video.permalink }}">{{ video.name }}</a></h2>
    {{ video.embedCode }}



{% endfor %}