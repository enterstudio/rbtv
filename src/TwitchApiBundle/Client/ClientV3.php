<?php

namespace TwitchApiBundle\Client;

class ClientV3 extends AbstractClientV3
{
    protected function getApiVersion()
    {
        return 'v3';
    }

    public function getInfo()
    {
        $data = $this->httpRequest('/');

        return $this->decode($data);
    }

    public function getBlocks($limit = 25, $offset = 0)
    {
        // TODO: Implement getBlocks() method.
    }

    public function addBlockTarget($target)
    {
        // TODO: Implement addBlockTarget() method.
    }

    public function deleteBlockTarget($target)
    {
        // TODO: Implement deleteBlockTarget() method.
    }

    public function getChannel($channel_name = '')
    {
        if (empty($channel_name)) {
            $data = $this->httpRequest('/channel');
        } else {
            $data = $this->httpRequest('/channels/' . $channel_name);
        }

        return $this->decode($data);
    }

    public function getChannelVideos($channel_name, $limit = 10, $offset = 0, $broadcasts = false, $hls = false)
    {
        if ($limit > 100) {
            throw new \InvalidArgumentException('The maximum of limit is 100.');
        }

        $broadcasts = (bool)$broadcasts;
        $hls = (bool)$hls;

        $data = $this->httpRequest('/channels/' . $channel_name . '/videos?limit=' . $limit . '&offset=' . $offset . '&broadcasts=' . $broadcasts . '&hls=' . $hls);

        return $this->decode($data);
    }

    public function getChannelFollows($limit = 25, $offset = 0, $direction = 'desc')
    {
        // TODO: Implement getChannelFollows() method.
    }

    public function getChannelEditors()
    {
        // TODO: Implement getChannelEditors() method.
    }

    public function getChannelSubscriptions($limit = 25, $offset = 0, $direction = 'asc')
    {
        // TODO: Implement getChannelSubscriptions() method.
    }

    public function getChannelTeams()
    {
        // TODO: Implement getChannelTeams() method.
    }

    public function updateChannel($status = '', $game = '', $delay = '')
    {
        // TODO: Implement updateChannel() method.
    }

    public function deleteChannelStreamKey($channel_name)
    {
        $data = $this->httpRequest('/channels/' . $channel_name . '/stream_key', [], 'DELETE');

        return $this->decode($data);
    }

    public function startChannelCommercial($channel_name, $length = 30)
    {
        if (!in_array($length, [30, 60, 90, 120, 150, 180])) {
            throw new \InvalidArgumentException('The length must be \'30\', \'60\', \'90\', \'120\', \'150\' or \'180\'.');
        }

        $data = $this->httpRequest('/channels/' . $channel_name . '/commercial', ['length' => $length], 'POST');

        // 204 No Content           if successful.
        // 422 Unprocessable Entity if commercial length not allowed, a commercial was ran less than 8 minutes ago, or the channel is not partnered.
        return false; // TODO: Check http code
    }

    public function getChatEndpoints($channel_name)
    {
        $data = $this->httpRequest('/chat/' . $channel_name);

        return $this->decode($data);
    }

    public function getChatBadges($channel_name)
    {
        $data = $this->httpRequest('/chat/' . $channel_name . '/badges');

        return $this->decode($data);
    }

    public function getChatEmoticons()
    {
        $data = $this->httpRequest('/chat/emoticons');

        return $this->decode($data);
    }

    public function getChannelsFollowedBy($username, $limit = 25, $offset = 0, $direction = 'desc', $sortby = 'created_at')
    {
        // TODO: Implement getChannelsFollowedBy() method.
    }

    public function getUserChannelRelationship($username, $target_username)
    {
        // TODO: Implement getUserChannelRelationship() method.
    }

    public function followChannel($channel_name)
    {
        // TODO: Implement followChannel() method.
    }

    public function unfollowChannel($channel_name)
    {
        // TODO: Implement unfollowChannel() method.
    }

    public function getTopGames($limit = 10, $offset = 0)
    {
        if ($limit > 100) {
            throw new \InvalidArgumentException('The maximum of limit is 100.');
        }

        $data = $this->httpRequest('/games/top?limit=' . $limit . '&offset=' . $offset);

        return $this->decode($data);
    }

    public function getIngests()
    {
        $data = $this->httpRequest('/ingests');

        return $this->decode($data);
    }

    public function searchChannels($query, $limit = 25, $offset = 0)
    {
        // TODO: Implement searchChannels() method.
    }

    public function searchStreams($query, $limit = 25, $offset = 0, $hls = false)
    {
        // TODO: Implement searchStreams() method.
    }

    public function searchGames($query, $type = 'suggest', $live = false)
    {
        // TODO: Implement searchGames() method.
    }

    public function getChannelStream($channel_name = '')
    {
        // TODO: Implement getChannelStream() method.
    }

    public function getFeaturedStreams($limit = 25, $offset = 0)
    {
        // TODO: Implement getFeaturedStreams() method.
    }

    public function getStreams($game = '', $channel = '', $limit = 25, $offset = 0, $client_id = '')
    {
        // TODO: Implement getStreams() method.
    }

    public function getStreamsSummary($game = '')
    {
        // TODO: Implement getStreamsSummary() method.
    }

    public function getFollowedStreams($limit = 25, $offset = 0)
    {
        if ($limit > 100) {
            throw new \InvalidArgumentException('The maximum of limit is 100.');
        }

        $data = $this->httpRequest('/streams/followed?limit=' . $limit . '&offset=' . $offset);

        return $this->decode($data);
    }

    public function isChannelSubscribedBy($username)
    {
        // TODO: Implement isChannelSubscribedBy() method.
    }

    public function isChannelSubscribed()
    {
        // TODO: Implement isChannelSubscribed() method.
    }

    public function getTeams($limit = 25, $offset = 0)
    {
        // TODO: Implement getTeams() method.
    }

    public function getTeam($team_name)
    {
        // TODO: Implement getTeam() method.
    }

    public function getUser($username = '')
    {
        if (empty($username)) {
            $data = $this->httpRequest('/user');
        } else {
            $data = $this->httpRequest('/users/' . $username);
        }

        return $this->decode($data);
    }

    public function getVideo($video_id)
    {
        $data = $this->httpRequest('/videos/' . $video_id);

        return $this->decode($data);
    }

    public function getTopVideos($limit = 10, $offset = 0, $game = '', $period = 'week')
    {
        if ($limit > 100) {
            throw new \InvalidArgumentException('The maximum of limit is 100.');
        }

        if (!in_array($period, ['week', 'month', 'all'])) {
            throw new \InvalidArgumentException('The period must be \'week\', \'month\' or \'all\'.');
        }

        $data = $this->httpRequest('/videos/top?limit=' . $limit . '&offset=' . $offset . '&game=' . $game . '&period=' . $period);

        return $this->decode($data);
    }

    public function getFollowedVideos($limit = 10, $offset = 0)
    {
        if ($limit > 100) {
            throw new \InvalidArgumentException('The maximum of limit is 100.');
        }

        $data = $this->httpRequest('/videos/followed');

        return $this->decode($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function decode($data)
    {
        return json_decode($data);
    }
}
