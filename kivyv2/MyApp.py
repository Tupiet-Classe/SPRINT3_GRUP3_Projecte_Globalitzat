from kivymd.app import MDApp
from kivymd.uix.screen import MDScreen
from kivymd.uix.list import OneLineListItem
import json

class MyApp(MDApp):
    
    def build(self):
        self.title ="TEST"
            
class ListOfCourses(MDScreen):
    def on_enter(self):
        self.list_courses()
        
    def on_touch_down(self, touch):
        self.list_courses()
                        
    def list_courses(self):
        print('hellooo')
        with open('kivyv2/cursoEVAPymeralia.json', 'r') as json_file:
            json_data = json.load(json_file)
            
        for course in json_data:
            print(course)
            print(self.ids)
            self.ids.test.add_widget(OneLineListItem(text="Hello, World!"))

if __name__ == "__main__":
    MyApp().run()
