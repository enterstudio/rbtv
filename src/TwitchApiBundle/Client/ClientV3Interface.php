<?php

namespace TwitchApiBundle\Client;

interface ClientV3Interface
{
    /**
   * Get top level links object and authorization status.
   *
   * @return mixed
   */
  public function getInfo();

  /**
   * Get user's block list.
   *
   * Authenticated, required scope: user_blocks_read
   *
   * @param int $limit Maximum number of objects in array. Default is 25. Maximum is 100.
   * @param int $offset Object offset for pagination. Default is 0.
   *
   * @return mixed
   */
  public function getBlocks($limit = 25, $offset = 0);

  /**
   * Add target to user's block list.
   *
   * Authenticated, required scope: user_blocks_edit
   *
   * @param $target
   *
   * @return mixed
   */
  public function addBlockTarget($target);

  /**
   * Delete target from user's block list.
   *
   * Authenticated, required scope: user_blocks_edit
   *
   * @param $target
   *
   * @return mixed
   */
  public function deleteBlockTarget($target);

  /**
   * Get channel object.
   *
   * If $username is empty:
   * Authenticated, required scope: channel_read
   *
   * @param string $channel_name
   *
   * @return mixed
   */
  public function getChannel($channel_name = '');

  /**
   * Get channel's list of videos.
   *
   * @param $channel_name
   *
   * @param int $limit Maximum number of objects in array. Default is 10. Maximum is 100.
   * @param int $offset Object offset for pagination. Default is 0.
   * @param bool $broadcasts Returns only broadcasts when 'true'. Otherwise only highlights are returned. Default is 'false'.
   * @param bool $hls Returns only HLS VoDs when 'true'. Otherwise only non-HLS VoDs are returned. Default is 'false'.
   *
   * @return mixed
   */
  public function getChannelVideos($channel_name, $limit = 10, $offset = 0, $broadcasts = false, $hls = false);

  /**
   * Get channel's list of following users.
   *
   * @param int $limit Maximum number of objects in array. Default is 25. Maximum is 100.
   * @param int $offset Object offset for pagination. Default is 0.
   * @param string $direction Creation date sorting direction. Default is desc. Valid values are 'asc' and 'desc'.
   *
   * @return mixed
   */
  public function getChannelFollows($limit = 25, $offset = 0, $direction = 'desc');

  /**
   * Get channel's list of editors.
   *
   * Authenticated, required scope: channel_read
   *
   * @return mixed
   */
  public function getChannelEditors();

  /**
   * Get list of users subscribed to channel.
   *
   * Authenticated, required scope: channel_subscriptions
   *
   * @param int $limit Maximum number of objects in array. Default is 25. Maximum is 100.
   * @param int $offset Object offset for pagination. Default is 0.
   * @param string $direction Sorting direction. Default is desc. Valid values are 'asc' and 'desc'.
   *
   * @return mixed
   */
  public function getChannelSubscriptions($limit = 25, $offset = 0, $direction = 'asc');

  /**
   * Get list of teams channel belongs to.
   *
   * @return mixed
   */
  public function getChannelTeams();

  /**
   * Update channel's status or game.
   *
   * Authenticated, required scope: channel_editor
   *
   * @param string $status Channel's title.
   * @param string $game Game category to be classified as.
   * @param string $delay Channel delay in seconds. Requires the channel owner's OAuth token.
   *
   * @return mixed
   */
  public function updateChannel($status = '', $game = '', $delay = '');

    /**
     * Reset channel's stream key.
     *
     * Authenticated, required scope: channel_stream
     *
     * @param $channel_name
     * @return mixed
     */
  public function deleteChannelStreamKey($channel_name);

    /**
     * Start commercial on channel.
     *
     * Authenticated, required scope: channel_commercial
     *
     * @param $channel_name
     * @param int $length Length of commercial break in seconds. Default value is 30. Valid values are 30, 60, 90, 120, 150, and 180. You can only trigger a commercial once every 8 minutes.
     * @return mixed
     */
  public function startChannelCommercial($channel_name, $length = 30);

  /**
   * Returns a links object to all other chat endpoints.
   *
   * @param $channel_name
   *
   * @return mixed
   */
  public function getChatEndpoints($channel_name);

  /**
   * Returns a list of chat badges that can be used in the :channel's chat.
   *
   * @param $channel_name
   *
   * @return mixed
   */
  public function getChatBadges($channel_name);

  /**
   * Returns a list of all emoticon objects for Twitch.
   *
   * @return mixed
   */
  public function getChatEmoticons();

  /**
   * @param $username
   * @param int $limit Maximum number of objects in array. Default is 25. Maximum is 100.
   * @param int $offset Object offset for pagination. Default is 0.
   * @param string $direction Sorting direction. Default is desc. Valid values are 'asc' and 'desc'.
   * @param string $sortby Sort key. Default is 'created_at'. Valid values are 'created_at', 'last_broadcast', and 'login'.
   *
   * @return mixed
   */
  public function getChannelsFollowedBy($username, $limit = 25, $offset = 0, $direction = 'desc', $sortby = 'created_at');

  /**
   * @param $username
   * @param $target_username
   *
   * @return mixed
   */
  public function getUserChannelRelationship($username, $target_username);

  /**
   * Follow a channel.
   *
   * @param $channel_name
   *
   * @return mixed
   */
  public function followChannel($channel_name);

  /**
   * Unfollow a channel.
   *
   * @param $channel_name
   *
   * @return mixed
   */
  public function unfollowChannel($channel_name);

  /**
   * Get games by number of viewers.
   *
   * @param int $limit Maximum number of objects in array. Default is 10. Maximum is 100.
   * @param int $offset Object offset for pagination. Default is 0.
   *
   * @return mixed
   */
  public function getTopGames($limit = 10, $offset = 0);

  /**
   * Get list of ingests.
   *
   * @return mixed
   */
  public function getIngests();

  /**
   * Find channels.
   *
   * @param string $query A url-encoded search query.
   * @param int $limit Maximum number of objects in array. Default is 25. Maximum is 100.
   * @param int $offset Object offset for pagination. Default is 0.
   *
   * @return mixed
   */
  public function searchChannels($query, $limit = 25, $offset = 0);

  /**
   * Find streams.
   *
   * @param string $query A url-encoded search query.
   * @param int $limit Maximum number of objects in array. Default is 25. Maximum is 100.
   * @param int $offset Object offset for pagination. Default is 0.
   * @param bool $hls If set to true, only returns streams using HLS. If set to false, only returns streams that are non-HLS.
   *
   * @return mixed
   */
  public function searchStreams($query, $limit = 25, $offset = 0, $hls = false);

  /**
   * Find games.
   *
   * @param string $query A url-encoded search query.
   * @param string $type 'suggest': Suggests a list of games similar to query, e.g. 'star' query might suggest 'StarCraft II: Wings of Liberty'.
   * @param bool $live
   *
   * @return mixed
   */
  public function searchGames($query, $type = 'suggest', $live = false);

  /**
   * Get stream object.
   *
   * @param $channel_name
   *
   * @return mixed
   */
  public function getChannelStream($channel_name = '');

  /**
   * Get a list of featured streams.
   *
   * @param int $limit Maximum number of objects in array. Default is 25. Maximum is 100.
   * @param int $offset Object offset for pagination. Default is 0.
   *
   * @return mixed
   */
  public function getFeaturedStreams($limit = 25, $offset = 0);

  /**
   * Returns a list of stream objects that are queried by a number of parameters sorted by number of viewers descending.
   *
   * @param string $game Streams categorized under game.
   * @param string $channel Streams from a comma separated list of channels.
   * @param int $limit Maximum number of objects in array. Default is 25. Maximum is 100.
   * @param int $offset Object offset for pagination. Default is 0.
   * @param string $client_id Only shows streams from applications of client_id.
   *
   * @return mixed
   */
  public function getStreams($game = '', $channel = '', $limit = 25, $offset = 0, $client_id = '');

  /**
   * Returns a summary of current streams..
   *
   * @param string $game Only show stats for the set game
   *
   * @return mixed
   */
  public function getStreamsSummary($game = '');

  /**
   * Returns a list of stream objects that the authenticated user is following.
   *
   * Authenticated, required scope: user_read
   *
   * @param int $limit Maximum number of objects in array. Default is 25. Maximum is 100.
   * @param int $offset Object offset for pagination. Default is 0.
   *
   * @return mixed
   */
  public function getFollowedStreams($limit = 25, $offset = 0);

  /**
   * Returns a subscription object which includes the user if that user is subscribed. Requires authentication for  the channel.
   *
   * Authenticated, required scope: channel_check_subscription
   *
   * @param $username
   *
   * @return mixed
   */
  public function isChannelSubscribedBy($username);

  /**
   * Returns a channel object that user subscribes to. Requires authentication for the user.
   *
   * Authenticated, required scope: user_subscriptions
   *
   * @return mixed
   */
  public function isChannelSubscribed();

  /**
   * Returns a list of active teams.
   *
   * @param int $limit Maximum number of objects in array. Default is 25. Maximum is 100.
   * @param int $offset Object offset for pagination. Default is 0.
   *
   * @return mixed
   */
  public function getTeams($limit = 25, $offset = 0);

  /**
   * Get team object.
   *
   * @param $team_name
   *
   * @return mixed
   */
  public function getTeam($team_name);

  /**
   * Returns a user object.
   *
   * If $username is not empty:
   * Authenticated, required scope: user_read
   *
   * @param $username
   *
   * @return mixed
   */
  public function getUser($username = '');

  /**
   * Returns a video object.
   *
   * @param $video_id
   *
   * @return mixed
   */
  public function getVideo($video_id);

  /**
   * Returns a list of videos created in a given time period sorted by number of views, most popular first.
   *
   * @param int $limit Maximum number of objects in array. Default is 10. Maximum is 100.
   * @param int $offset Object offset for pagination. Default is 0.
   * @param string $game Returns only videos from 'game'.
   * @param string $period Returns only videos created in time period. Valid values are 'week', 'month', or 'all'. Default is 'week'.
   *
   * @return mixed
   */
  public function getTopVideos($limit = 10, $offset = 0, $game = '', $period = 'week');

  /**
   * Returns a list of video objects from channels that the authenticated user is following.
   *
   * Authenticated, required scope: user_read
   *
   * @param int $limit Maximum number of objects in array. Default is 10. Maximum is 100.
   * @param int $offset Object offset for pagination. Default is 0.
   *
   * @return mixed
   */
  public function getFollowedVideos($limit = 10, $offset = 0);
}
