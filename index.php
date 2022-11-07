@php
                        $token = 'isiin tokennya';
        
                        function get_CURL($url)
                        {
                            $curl = curl_init();
                            curl_setopt($curl, CURLOPT_URL, $url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                            $result = curl_exec($curl);
                            curl_close($curl);
                            
                            return json_decode($result, true);
                        }
        
                        $result = get_CURL('https://graph.instagram.com/me/media?fields=id,caption,media_url,thumbnail_url,permalink&access_token='.$token);
                        $res = [];

                        $photos = [];
                            $link = [];
                        
                            foreach($result['data'] as $photo) {
                                $photos[] = $photo['media_url'];
                                $link[] = $photo['permalink'];
                                $res[] = $photo;
                            }
                        
        
                        $i = 0;
                    @endphp 
                    
                    @forelse ($res as $photo)
                        @if ($i < 4)
                        <a href="{{$photo['permalink']}}" target=”_blank”>
                           @if (substr($photo['media_url'],0,13) === 'https://video')
                                <img src="<?=$photo['thumbnail_url'];?>" class="aspect-square object-cover rounded-xl" alt="">
                            @else
                                <img src="<?=$photo['media_url'];?>" class="aspect-square object-cover rounded-xl" alt="">
                            @endif 
                        </a>
                        @php
                            $i++;
                        @endphp
                    @endif   
                    @empty
                        
                    @endforelse

