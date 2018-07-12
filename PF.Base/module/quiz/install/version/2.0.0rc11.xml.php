<upgrade>
	<phrases>
		<phrase>
			<module_id>quiz</module_id>
			<version_id>2.0.0rc11</version_id>
			<var_name>user_setting_can_access_quiz</var_name>
			<added>1260286388</added>
			<value>Can browse and view the quiz module?</value>
		</phrase>
		<phrase>
			<module_id>quiz</module_id>
			<version_id>2.0.0rc11</version_id>
			<var_name>user_setting_can_create_quiz</var_name>
			<added>1260329212</added>
			<value>Can create a quiz?</value>
		</phrase>
	</phrases>
	<user_group_settings>
		<setting>
			<is_admin_setting>0</is_admin_setting>
			<module_id>quiz</module_id>
			<type>boolean</type>
			<admin>1</admin>
			<user>1</user>
			<guest>1</guest>
			<staff>1</staff>
			<module>quiz</module>
			<ordering>0</ordering>
			<value>can_access_quiz</value>
		</setting>
		<setting>
			<is_admin_setting>0</is_admin_setting>
			<module_id>quiz</module_id>
			<type>boolean</type>
			<admin>1</admin>
			<user>1</user>
			<guest>0</guest>
			<staff>1</staff>
			<module>quiz</module>
			<ordering>0</ordering>
			<value>can_create_quiz</value>
		</setting>
	</user_group_settings>
	<hooks>
		<hook>
			<module_id>quiz</module_id>
			<hook_type>service</hook_type>
			<module>quiz</module>
			<call_name>quiz.service_process_add__end</call_name>
			<added>1260366442</added>
			<version_id>2.0.0rc11</version_id>
			<value />
		</hook>
	</hooks>
</upgrade>