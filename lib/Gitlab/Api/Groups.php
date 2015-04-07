<?php namespace Gitlab\Api;

class Groups extends AbstractApi
{
    /**
     * @param int $page
     * @param int $per_page
     * @return mixed
     */
    public function all($page = 1, $per_page = self::PER_PAGE)
    {
        return $this->get('groups', array(
            'page' => $page,
            'per_page' => $per_page
        ));
    }

    /**
     * @param string $query
     * @param int $page
     * @param int $per_page
     * @return mixed
     */
    public function search($query, $page = 1, $per_page = self::PER_PAGE)
    {
        return $this->get('groups?search='.rawurlencode($query), array(
            'page' => $page,
            'per_page' => $per_page
        ));
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->get('groups/'.rawurlencode($id));
    }

    /**
     * @param string $name
     * @param string $path
     * @param string $description
     * @return mixed
     */
    public function create($name, $path, $description = null)
    {
        return $this->post('groups', array(
            'name' => $name,
            'path' => $path,
            'description' => $description
        ));
    }

    /**
     * @param int $group_id
     * @return mixed
     */
    public function remove($group_id)
    {
        return $this->delete('groups/'.rawurlencode($group_id));
    }

    /**
     * @param int $group_id
     * @param int $project_id
     * @return mixed
     */
    public function transfer($group_id, $project_id)
    {
        return $this->post('groups/'.rawurlencode($group_id).'/projects/'.rawurlencode($project_id));
    }

    /**
     * @param int $id
     * @param int $page
     * @param int $per_page
     * @return mixed
     */
    public function members($id, $page = 1, $per_page = self::PER_PAGE)
    {
        return $this->get('groups/'.rawurlencode($id).'/members', array(
            'page' => $page,
            'per_page' => $per_page
        ));
    }

    /**
     * @param int $group_id
     * @param int $user_id
     * @param int $access_level
     * @return mixed
     */
    public function addMember($group_id, $user_id, $access_level)
    {
        return $this->post('groups/'.rawurlencode($group_id).'/members', array(
            'user_id' => $user_id,
            'access_level' => $access_level
        ));
    }

    /**
     * @param int $group_id
     * @param int $user_id
     * @param int $access_level
     * @return mixed
     */
    public function saveMember($group_id, $user_id, $access_level)
    {
        return $this->put('groups/'.rawurlencode($group_id).'/members/'.rawurlencode($user_id), array(
            'access_level' => $access_level
        ));
    }

    /**
     * @param int $group_id
     * @param int $user_id
     * @return mixed
     */
    public function removeMember($group_id, $user_id)
    {
        return $this->delete('groups/'.rawurlencode($group_id).'/members/'.rawurlencode($user_id));
    }
}
