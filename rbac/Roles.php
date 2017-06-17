<?php

namespace app\rbac;

class Roles
{
	/**
	 * Superuser can do all what avalable
	 */
	const ADMIN  = 'admin';
	/**
	 * General manager can create orders, edit it 
	 * and delete it.
	 */
	const GENERAL_MANAGER = 'general_manager';
	/**
	 * Manager can create orders, edit it (only self created) 
	 * and delete it.
	 */
	const MANAGER = 'manager';
    
}
