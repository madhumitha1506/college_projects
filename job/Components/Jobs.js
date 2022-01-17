import React,{Component} from 'react';
import {ScrollView,View,FlatList,TouchableOpacity,Text,Linking} from 'react-native';
import {SearchBar} from 'react-native-elements';
import data from '../jsons/monsterjson.json'
export default class Jobs extends Component {
    constructor(props){
        super(props)
        this.state={
           
            dataSource:[],
            data :[]
        }
    }

    componentDidMount(){
        this.setState({
            
            dataSource:data,
            datafilter:data
        });
    }
    search(text){
        this.setState({
          datafilter:this.state.dataSource.filter(i=>
            i.job_title.toLowerCase().includes(text),
            ),
        });
      }
    render()
    {
        return(

            <ScrollView>
                <SearchBar
                    placeholder="Search Here...."
                    lightTheme round
                    onChangeText={text=>{this.search(text)}}
                />
                <FlatList
             
                    data={this.state.datafilter}
                    renderItem={({item})=>
                        
                            <View style={{borderWidth:2,marginBottom:20,marginLeft:20,marginRight:20,borderRadius:15}}>
                                <View>
                                    <Text style={{fontSize:15,fontWeight:'bold',marginBottom:10,textAlign:'center',marginTop:10}}>JobTitile:{item.job_title}</Text>
                                    <Text style={{fontSize:15,fontWeight:'bold',marginBottom:10,textAlign:'center'}}>CompanyName:{item.company_name}</Text>
                                    <Text style={{fontSize:15,fontWeight:'bold',marginBottom:10,textAlign:'center'}}>Location:{item.company_location}</Text>
                                    <TouchableOpacity onPress={()=>Linking.openURL(item.company_link)} style={{borderWidth:2,borderRadius:20,marginLeft:80,marginTop:10,padding:8,width:100,height:40,marginBottom:10}}>
                                        <Text style={{fontSize:20,fontWeight:'bold',textAlign:'center'}}>APPLY</Text>
                                    </TouchableOpacity>
                                </View>
                                
                            </View>
                        

                    }
                    keyExtractor={(item, index) => index.toString()}
                
            />
            </ScrollView>
               
            
             
        );
    }
}
