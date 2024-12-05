<?php

namespace App\Traits;

trait Filterable
{
    protected function concatenateJoinedName($joined_name, $column_name)
    {
        return $joined_name ? $joined_name . '.' . $column_name : $column_name;
    }

    protected function isFieldValid($field)
    {
        return !is_null($field) && trim($field) !== '';
    }


    //----------------------------------------------------SCOPE FUNCTIONS------------------------------------------------------------//

    /**
     * Summary of scopeRelationId
     * @param mixed $query
     * @param mixed $relation
     * @param mixed $id
     * @param mixed $joined_name
     * @return mixed
     */
    
    public function scopeFilter($query, $column_name, $val,  $joined_name = null)
    {

        if ($this->isFieldValid($val)) {
            $column = $this->concatenateJoinedName($joined_name, $column_name);
            return $query->where($column, $val);
        }

        return $query;
    }

    public function scopeWhereDateRange($query, $startDate, $endDate, $joined_name = null)
    {
        
        if ($this->isFieldValid($startDate) && $this->isFieldValid($endDate)) {

            $column = $this->concatenateJoinedName($joined_name, 'date');
            return $query->whereBetween($column, [$startDate, $endDate]);
        }
        return $query; 
    }

    public function scopeWhereStatus($query, $status, $joined_name = null)
    {
        if ($this->isFieldValid($status)) {
            $column = $this->concatenateJoinedName($joined_name, 'status');
            return $query->where($column, $status);
        }

        return $query;
    }

    public function scopeWhereId($query, $id, $joined_name = null)
    {
        if ($this->isFieldValid($id)) {
            $column = $this->concatenateJoinedName($joined_name, 'id');
            return $query->where($column, $id);
        }

        return $query;
    }

    public function scopeWhereCompanyId($query, $companyId, $joined_name = null)
    {
        if ($this->isFieldValid($companyId)) {
            $column = $this->concatenateJoinedName($joined_name, 'company_id');
            return $query->where($column, $companyId);
        }

        return $query;
    }

    public function scopeWhereName($query, $name, $joined_name = null, $exact = true)
    {
        if ($this->isFieldValid($name)) {
            $column = $this->concatenateJoinedName($joined_name, 'name');
            return $exact
                ? $query->where($column, $name)
                : $query->where($column, 'like', '%' . $name . '%');
        }

        return $query;
    }


}
