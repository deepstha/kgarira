

$wp_customize->add_setting('global_show_min_read_number',
 array(              
   'default' => 200,              
   'capability' => 'edit_theme_options',              
   'sanitize_callback' => 'absint',          
 )      
);      
$wp_customize->add_control('global_show_min_read_number',          
 array(              
  'label' => esc_html__('Number of Words per Minute Read', 'isha'),              
  'section' => 'your_section_name',              
  'type' => 'number',              
  'priority' => 130          
 )      
);
?> 